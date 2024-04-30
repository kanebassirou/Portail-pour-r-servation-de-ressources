<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserNotification extends Notification
{
    use Queueable;

    public $resourceName;
    public $resourceType;
    public $dateResservation;
    public $startTime;
    public $endTime;
    // public $location;
    // public $equipment;
    public $buildingName;
    public $arrivalTime;

    /**
     * Create a new notification instance.
     *
     * @param string $resourceName
     * @param string $resourceType
     * @param string $dateResservation
     * @param string $startTime
     * @param string $endTime
     * @param string $location
     * @param int $arrivalTime
     */
    public function __construct($resourceName, $resourceType, $dateResservation, $startTime, $endTime,$arrivalTime)
    {
        $this->resourceName = $resourceName;
        $this->resourceType = $resourceType;
        $this->dateResservation = $dateResservation;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->arrivalTime = $arrivalTime;
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
                    ->greeting('Confirmation de Réservation')
                    ->line("Nous sommes heureux de vous informer que votre réservation de ressources de l'UFR SET pour {$this->resourceName} a été confirmée avec succès !")
                    ->line("**Détails de la réservation:**")
                    ->line("**Nom de la ressource:** {$this->resourceName}")
                    ->line("**Type de ressource:** {$this->resourceType}")
                    ->line("**Date et heure de réservation:** le {$this->dateResservation} à {$this->startTime} - {$this->endTime}")
                    ->line("Pour accéder à la ressource réservée, veuillez vous présenter au bureau de Madame Konaté  au moins {$this->arrivalTime} minutes avant pour prendre le ressource  .")
                    ->action('Voir la Réservation', url('/'))
                    ->line("Merci d\'utiliser notre portail de reservation reservation de ressource pour l'UFR SET!");
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'resourceName' => $this->resourceName,
            'resourceType' => $this->resourceType,
            'startTime' => $this->startTime,
            'endTime' => $this->endTime,

            'arrivalTime' => $this->arrivalTime,
        ];
    }
}
