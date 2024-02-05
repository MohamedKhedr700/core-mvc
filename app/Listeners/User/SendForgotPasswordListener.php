<?php

namespace App\Listeners\User;

use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Raid\Core\Event\Events\Contracts\EventListenerInterface;

class SendForgotPasswordListener implements EventListenerInterface
{
    /**
     * Handle the listener.
     */
    public function handle(array $data): void
    {
        $link = front_url('reset_password', $data['email'].'/'.$data['token']);

        Mail::to($data['email'])->send(new ForgotPasswordMail($link));
    }
}
