<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\InstantReward;
use App\Models\Register;
use App\Repositories\RegisterRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function store(RegisterRequest $request)
    {
        if (!$this->checkCaptcha($request->input('h-captcha-response'))) {
            return response()->json([
                'status'=>'ERROR',
                'message' => 'Zaznacz pole captcha'
            ]);
        }
        if (!$this->checkBill($request->bill_date, $request->bill_number)) {
            return response()->json([
                'status'=>'ERROR',
                'message' => 'Paragon został już użyty'
            ]);
        }

        try {
            $repo = new RegisterRepository();
            $register = $repo->create([
                'email' => $request->email,
                'bill_number' => $request->bill_number,
                'bill_date' => $request->bill_date,
                'ip_address' => $this->getIpAddress(),
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'status'=>'ERROR',
                'message' => 'Nie udało się zapisać zgłoszenia'
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
}
