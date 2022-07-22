<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Mail\WinnerMail;
use App\Models\Register;
use App\Repositories\MailsRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Registers/List', [
            'registers' => Register::all(),
            'title' => "Wszystkie zgłoszenia",
        ]);
    }

    public function winners()
    {
        return Inertia::render('Admin/Registers/List', [
            'registers' => Register::whereNotNull('prize')->get(),
            'title' => "Zwycięzcy",
        ]);
    }

    public function show(Register $register)
    {
        return Inertia::render('Admin/Registers/Details', [
            'register' => $register,
            'mails' => $register->mails,
        ]);
    }

    public function winner(Register $register, $prize)
    {
        $register->update([
            'prize' => $prize,
            'code' => $this->generateCode(),
        ]);

        return redirect()->back();
    }

    public function undoWinner(Register $register)
    {
        $register->update([
            'prize' => null,
        ]);

        return redirect()->back();
    }

    public function sendWinnerEmail(Register $register)
    {
        $register->update([
            'mail_send' => 1,
            'expiration_date' => Carbon::now()->addDays(7)->addHour(),
        ]);
        $repo = new MailsRepository();
        $mail = $repo->create([
            'register_id' => $register->id,
            'email' => $register->email,
            'subject' => 'Gratulujemy wygranej',
            'message' => view('mails.winner' . $register->prize)->render(),
            'type' => 2]);

        try {
            Mail::to($register->email)->send(new WinnerMail($register));
            $mail->update(['status' => 1]);
        } catch (\Exception $ex) {
            $register->update(['mail_send' => 2]);
            $mail->update(['status' => 2]);
        }
        return redirect()->back();

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
