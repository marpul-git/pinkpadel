<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        VerifyEmail::$toMailCallback = function ($notifiable, $verificationUrl) {
            return (new MailMessage)
                ->subject(Lang::get('Verificar dirección de email'))
                ->greeting(Lang::get("Hola ") . $notifiable->name)
                ->line(Lang::get('Haga click en este botón para verificar su email.'))
                ->action(Lang::get('VERIFICAR EMAIL'), $verificationUrl)
                ->line(Lang::get('Si no creaste esta cuenta, puedes ignorar este mensaje.'))
                ->salutation(new HtmlString(
                    Lang::get("Saludos.") . '<br>' . '<strong>' . Lang::get("Nuestro equipo.") . '</strong>'
                ));
        };
    }
}
