<?php

namespace Cookiesoft\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class DefaultResetPasswordNotification extends ResetPassword
{

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("Redifinição de senha - Cookiesoft")
            ->line('Você está recebendo este e-mail, porque uma definição de senha foi requisitada.')
            ->action('Redefinir senha', url(config('app.url').route('password.reset', $this->token, false)))
            ->line('Se você não solicitou uma reinicialização de senha, nenhuma ação adicional é necessária.');
    }


}
