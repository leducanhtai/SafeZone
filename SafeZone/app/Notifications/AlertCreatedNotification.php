<?php

namespace App\Notifications;

use App\Models\Alert;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Channels\CustomDatabaseChannel;


class AlertCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public Alert $alert)
    {
        // Ensure relation is available when queued
        $this->alert->loadMissing('address');
    }

    public function via(object $notifiable): array
    {
        // Store a copy in DB and send an email
        return [CustomDatabaseChannel::class, 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $alert = $this->alert;
        $title = $alert->title ?? 'New Alert';
        $type = ucfirst($alert->type ?? 'event');
        $severity = strtoupper($alert->severity ?? 'info');
        $addressLine = optional($alert->address)->address_line;

        $url = url(route('disaster-monitor'));

        $mail = (new MailMessage)
            ->subject("[SafeZone] {$severity} {$type} alert: {$title}")
            ->greeting('Hello,')
            ->line($title)
            ->line("Type: {$type}")
            ->line("Severity: {$severity}");

        if ($addressLine) {
            $mail->line("Location: {$addressLine}");
        }

        if (!empty($alert->description)) {
            $mail->line('Description: ' . strip_tags((string) $alert->description));
        }

        $mail->action('Open Disaster Monitor', $url)
             ->line('Stay safe and follow instructions from authorities.');

        return $mail;
    }

    public function toArray(object $notifiable): array
    {
        return [
            'alert_id' => $this->alert->id,
            'type' => $this->alert->type,
            'severity' => $this->alert->severity,
            'title' => $this->alert->title,
        ];
    }
}
