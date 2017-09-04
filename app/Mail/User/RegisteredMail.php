<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Auth\Authenticatable;

class RegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Authenticatable
     */
    protected $user;

    /**
     * Create a new message instance.
     *
     * @param Authenticatable $user
     *
     * @return void
     */
    public function __construct(Authenticatable $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(env('APP_NAME').' - Благодарим за регистрацию')->markdown('user/registered', [
            'user' => $this->user
        ]);
    }
}