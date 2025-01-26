<?php
// app/Notifications/CustomVerifyEmail.php
namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailNotification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomVerifyEmail extends VerifyEmailNotification
{
    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->subject('Vérifiez votre adresse e-mail')
            ->greeting('Bonjour !')
            ->line('Veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse e-mail.')
            ->action('Vérifiez votre adresse e-mail', $verificationUrl)
            ->line('Si vous n\'avez pas créé de compte, aucune autre action n\'est requise.')
            ->line('Cordialement,')
            ->line('rrset')
            ->line('Si vous rencontrez des difficultés pour cliquer sur le bouton "Vérifiez votre adresse e-mail", copiez et collez l\'URL ci-dessous dans votre navigateur web :')
            ->line($verificationUrl);
    }
}
