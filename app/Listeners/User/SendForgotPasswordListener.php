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
        Mail::to($data['email'])->send(new ForgotPasswordMail($this->getLink($data)));
    }

    /**
     * Get forgot password link.
     */
    private function getLink(array $data): string
    {
        return front_url('reset_password', $data['email'].'/'.$data['token']);
    }
}
