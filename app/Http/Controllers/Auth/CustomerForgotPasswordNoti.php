<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomerForgotPasswordNoti extends Notification
{
    use Queueable;

    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reset mật khẩu tài khoản của bạn')
            ->line('Bạn vừa yêu cầu reset mật khẩu.')
            ->action('Đặt lại mật khẩu', $this->url)
            ->line('Nếu không phải bạn yêu cầu, vui lòng bỏ qua email này.');
    }
}
