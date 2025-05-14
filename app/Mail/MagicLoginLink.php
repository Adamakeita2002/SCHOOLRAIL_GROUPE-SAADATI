<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\URL;

class MagicLoginLink extends Mailable
{
    use Queueable, SerializesModels;

      public $plaintextToken;
      public $expiresAt;

  public function __construct($plaintextToken, $expiresAt)
  {
    $this->plaintextToken = $plaintextToken;
    $this->expiresAt = $expiresAt;
  }

    /**
     * Build the message.
     *
     * @return $this
     */
  public function build()
  {
    return $this->subject(
      config('app.name') . ' Login Verification'
    )->markdown('emails.magic-login-link', [
      'url' => URL::temporarySignedRoute('/cli/login', $this->expiresAt, [
        'token' => $this->plaintextToken,
      ]),
    ]);
  }
  
}
