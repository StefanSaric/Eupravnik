<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class PasswordMail extends Mailable
{
    use Queueable, SerializesModels;



    public function __construct()
    {

    }

    public function build()
    {
        return $this->from('stefan.saric.exe4u@gmail.com')->subject('Promena Šifre Korsininka')->view('emails.passwords');
    }
}
