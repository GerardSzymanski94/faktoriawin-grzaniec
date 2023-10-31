<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\ContactMail;
use App\Mail\WinnerMail;
use App\Models\InstantReward;
use App\Models\Register;
use App\Repositories\RegisterRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request)
    {
        if (!$this->checkCaptcha($request->input('h-captcha-response'))) {
            return redirect()->to('/#form')->with(['captcha-error' => true]);
        }
        if (!$this->checkBill($request->bill_date, $request->bill_number)) {
            return redirect()->to('/#form')->with(['bill-error' => true]);
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
            return redirect()->to('/#form')->with(['save-error' => true]);
        }

        //sprawdzamy czy gracz jest najbliższej wygrawającego czasu i zwracamy odpowiedni numer nagrody i animacji
        $reward = $this->checkReward($register);

        if ($reward > 0) {
            return redirect()->to('/#form')->with(['winner' => true]);
        }

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


    private function checkReward($user)
    {
        $reward = InstantReward::whereStatus(1)->first();
        if (!isset($reward->id)) {
            return 0;
        }
        $rewardDate = Carbon::createFromDate($reward->time)->subHours(2)->format('Y-m-d H:i:s');

        $register = Register::where('created_at', '>=', $rewardDate)->whereNull('reward_id')->first();
        if (isset($register->id)) {
            if ($register->id == $user->id) {
                $user->reward_id = $reward->id;
                $user->prize = $reward->type;
                $user->code = $this->generateCode(15);
                $user->save();

                $reward->status = 2;
                $reward->save();

                //$this->sendMail($user);
                return $reward->type;
            } else {

                //$this->sendMailDefeat($user);
                return 0;
            }
        } else {

            //$this->sendMailDefeat($user);
            return 0;
        }
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

    public function winnerForm($code) {
        $register = Register::whereCode($code)->firstOrFail();

        return view('forms.winner', compact('register'));
    }

    public function storeWinnerForm(Request $request) {
        $register = Register::whereCode($request->code)->firstOrFail();

       /* if ($register->email != $request->email) {
            return redirect()->back();
        }*/

        $register->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'street' => $request->street ?? null,
            'zip_code' => $request->zip_code ?? null,
            'city' => $request->city ?? null,
            'phone' => $request->phone ?? null,
            'confirm_data' => 1,
            'status' => 2,
        ]);
        return redirect()->back();
    }
}
