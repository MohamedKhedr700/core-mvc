<?php

namespace App\Listeners\Admin;

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
        $link = front_admin_url('reset_password_admin', $data['email'].'/'.$data['token']);
dd($link);
        Mail::to($data['email'])->send(new ForgotPasswordMail($link));
    }
}
