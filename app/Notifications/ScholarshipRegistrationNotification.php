<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;
use App\Models\Scholarship;

class ScholarshipRegistrationNotification extends Notification
{
    protected $scholarship;

    public function __construct(Scholarship $scholarship)
    {
        $this->scholarship = $scholarship;
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toArray($notifiable): array
    {
        return [
            'message' => "Anda telah berhasil mendaftar beasiswa {$this->scholarship->name}",
            'scholarship_id' => $this->scholarship->id,
            'scholarship_name' => $this->scholarship->name,
            'created_at' => now()
        ];
    }
}