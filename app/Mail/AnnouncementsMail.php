<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class AnnouncementsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;


    public function __construct($data)
    {
        $this->data = $data;

    }

    public function build()
    {
        return $this->from(''.Auth::user()->email.'')->subject('Obavestenje ')->view('emails.announcements')->with('data', $this->data);
    }
}
