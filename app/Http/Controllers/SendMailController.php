<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Repositories\MailsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{

    public function contact(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $repo = new MailsRepository();
        $mail = $repo->create(['email' => $request->email, 'subject' => 'Formularz kontaktowy', 'message' => $request->message, 'type' => 1, 'ip_address' => $this->getIpAddress()]);

        try {
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail(['email' => $request->email, 'message' => $request->message]));
            $mail->update(['status' => 1]);
        } catch (\Exception $ex) {
            $mail->update(['status' => 2]);
            return redirect()->to('/#contact ')->with(['contact-error' => true]);
        }

        return redirect()->to('/#contact ')->with(['contact' => true]);
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
