<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function sendMail(){
        //send mail
        $details = [
            'title' => 'Mail from ....',
            'body' => 'This....'
        ];

        Mail::to("buituanson85@gmail.com")->send(new SendMail($details));
        return view('pages.send_mail');
    }

    public function mailExample(){
        return view('pages.send_mail');
    }
}
