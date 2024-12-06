<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminRegister extends Notification
{
    use Queueable;
    protected $name, $pass;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(String $name, String $pass)
    {
        $this->name = $name;
        $this->pass = $pass;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Bienvenid@ ' . $this->name .' al Sistema FCFM')
            ->greeting('¡Hola ' . $this->name . '!')
            ->line('Has sido registrado como usuario para el sistema FCFM')
            ->line('Tu contraseña de acceso es: '. $this->pass)
            ->action('Acceder al sistema',  env('APP_URL').'/login')
            ->line('Recuerda no compartir tu contraseña por seguridad.')
            ->line('Puedes cambiar tu contraseña desde el tu perfil de usuario')
            ->line('*Si no enviaste esta solicitud o si necesitas ayuda contáctanos en soporte: fcfm.dep.multimedia@gmail.com');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
