<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\WinnerMail;
use App\Models\Register;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
            'mail_send' => 1,
            'code' => $this->generateCode(),
            'expiration_date' => Carbon::now()->addDays(7)->addHour(),
        ]);
        try {
            //\Illuminate\Support\Facades\Mail::to($register->email)->send(new WinnerMail($register));
        } catch (\Exception $ex) {
            $register->update([
                'mail_send' => 2,
            ]);
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
