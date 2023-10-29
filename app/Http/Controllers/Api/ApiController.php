<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Mail\ConfirmMail;
use App\Mail\ContactMail;
use App\Models\InstantReward;
use App\Models\Register;
use App\Repositories\MailsRepository;
use App\Repositories\RegisterRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name' => 'required',
            'lastname' => 'required',
            'answer' => 'required',
            'bill_photo' => 'required',
            'aggrement' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>'ERROR',
                'message' => 'Uzupełnij wszystkie pola, dodaj zdjęcie paragonu i zaakceptuj regulamin'
            ]);
        }

        if(Str::length($request->answer) > 400){
            return response()->json([
                'status'=>'ERROR',
                'message' => 'Odpowiedź na pytanie może mieć max 400 znaków'
            ]);
        }


      /*  if (!$this->checkCaptcha($request->input('h-captcha-response'))) {
            return response()->json([
                'status'=>'ERROR',
                'message' => 'Zaznacz pole captcha'
            ]);
        }*/
       /* if (!$this->checkBill($request->bill_date, $request->bill_number)) {
            return response()->json([
                'status'=>'ERROR',
                'message' => 'Paragon został już użyty'
            ]);
        }*/

        try {
            $repo = new RegisterRepository();
            $register = $repo->create([
                'email' => $request->email,
                'name' => $request->name,
                'lastname' => $request->lastname,
                'description' => $request->answer,
                'ip_address' => $this->getIpAddress(),
            ]);
            if ($request->hasFile('bill_photo')) {
                $file = $request->bill_photo;
                $ph = $file->store('/documents/' . $register->id . '/', 'public');

                $register->bill_photo = $ph;

                $register->save();

            }
        } catch (\Exception $ex) {
            return response()->json([
                'status'=>'ERROR',
                'message' => 'Nie udało się zapisać zgłoszenia'
            ]);
        }

        try{
            $repo = new MailsRepository();
            $mail = $repo->create([
                'register_id' => $register->id,
                'email' => $register->email,
                'subject' => 'Potwierdzenie zgłoszenia',
                'message' => view('mails.confirm')->render(),
                'type' => 2]);

            Mail::to($register->email)->send(new ConfirmMail($register));
            $mail->update(['status' => 1]);
        } catch (\Exception $ex) {
            return response()->json([
                'status'=>'ERROR',
                'message' => 'Zgłoszenie zostało zapisane ale nie udało się wysłać maila z potwierdzeniem.'
            ]);
        }

        return response()->json([
            'status'=>'OK',
            'message' => 'Zgłoszenie zostało wysłane'
        ]);
        return redirect()->to('/#form')->with(['success' => true]);

    }


    private function checkCaptcha($token)
    {
        # PSEUDO CODE
        $secretKey = "0x5c75905a4014A25c6Cf3d01971E6010D755AcD3b";   # replace with your secret key
        $verifyUrl = "https://hcaptcha.com/siteverify";


# Build payload with secret key and token.
        $data = [];
        $data['secret'] = $secretKey;
        $data['response'] = $token;

        $postdata = http_build_query($data);
        $ch = curl_init($verifyUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        $resultArray = json_decode($result, true);

        if (!isset($resultArray['success']) || $resultArray['success'] != true)
            return false;
        return true;
    }

    private function checkBill($billDate, $billNumber)
    {
        if (Register::where('bill_date', $billDate)->where('bill_number', $billNumber)->exists()) {
            return false;
        }
        return true;
    }

    private function getIpAddress()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }


    private function generateCode($length = 10): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>'ERROR',
                'message' => 'Uzupełnij wszystkie pola'
            ]);
        }

        $repo = new MailsRepository();
        $mail = $repo->create(['email' => $request->email, 'subject' => 'Formularz kontaktowy', 'message' => $request->message, 'type' => 1, 'ip_address' => $this->getIpAddress()]);

        try {
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail(['email' => $request->email, 'message' => $request->message]));
            $mail->update(['status' => 1]);
        } catch (\Exception $ex) {
            $mail->update(['status' => 2]);
            return response()->json([
                'status'=>'ERROR',
                'message' => 'Nie udało się wysłać formularza. Spróbuj ponownie'
            ]);
        }

        return response()->json([
            'status'=>'OK',
            'message' => 'Twoje pytanie zostało wysłane!'
        ]);
    }


}
