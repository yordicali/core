<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordEs extends ResetPassword
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('🔑 Restablecimiento de contraseña')
            ->greeting('¡Hola!')
            ->line('Recibiste este correo porque solicitaste restablecer tu contraseña.')
            ->action('Restablecer contraseña', url(route('password.reset', [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false)))
            ->line('Este enlace de restablecimiento caducará en '.config('auth.passwords.'.config('auth.defaults.passwords').'.expire').' minutos.')
            ->line('Si no solicitaste restablecer la contraseña, no es necesario realizar ninguna acción.');
    }
}
