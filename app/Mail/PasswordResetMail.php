<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function build()
    {
        return $this->view('emails.password_reset')
                    ->with(['code' => $this->code]);
    }
}
