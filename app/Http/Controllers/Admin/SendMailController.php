<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SendMail;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SendMailController extends Controller
{
    public function show(SendMail $mail)
    {
        return Inertia::render('Admin/Mails/Review', [
            'mail' => $mail,
        ]);
    }
}
