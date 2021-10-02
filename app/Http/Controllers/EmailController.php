<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(){
        $details = [
            'title' => 'Mail from Actionwebman',
            'body' => 'This is for testing email using gmail'
        ];

        Mail::to("jeweltutin@gmail.com")->send(new TestMail($details));
        return "Email Successfully sent";
    }
}
