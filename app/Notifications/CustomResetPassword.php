<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Lang;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPassword extends Notification
{
    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                 
                    ->subject(Lang::get('Actualizar'))
                    ->greeting(Lang::get("Hola ") . $notifiable->name)
                    ->line(Lang::get('Está recibiendo este correo electrónico porque hemos recibido una solicitud de restablecimiento de contraseña para su cuenta.'))
                    ->action(Lang::get('Actualizar Password'), route('password.reset', ['token'=> $this->token]))
                    ->line(Lang::get('Este enlace de restablecimiento de contraseña caducará en :count minutos.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
                    ->line(Lang::get('Si no ha solicitado el restablecimiento de la contraseña, no es necesario realizar ninguna acción.'))
                    ->salutation(new HtmlString(
                        Lang::get("Saludos.") . '<br>' . '<strong>' . Lang::get("Nuestro equipo.") . '</strong>'
                    ))
                    ;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
