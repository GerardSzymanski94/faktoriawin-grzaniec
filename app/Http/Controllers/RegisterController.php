<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\ContactMail;
use App\Mail\WinnerMail;
use App\Models\Register;
use App\Repositories\RegisterRepository;
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
            $repo->create([
                'email' => $request->email,
                'bill_number' => $request->bill_number,
                'bill_date' => $request->bill_date,
                'ip_address' => $this->getIpAddress(),
            ]);
        } catch (\Exception $ex) {
            return redirect()->to('/#form')->with(['save-error' => true]);
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

}
