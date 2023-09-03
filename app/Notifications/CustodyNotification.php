<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustodyNotification extends Notification
{
    use Queueable;

    private $custody_id;
    private $custody_num;
    private $custody_date;


    public function __construct($custody_id, $custody_num, $custody_date)
    {
        //
        $this->custody_id = $custody_id;
        $this->custody_num = $custody_num;
        $this->custody_date = $custody_date;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return [
            //
            'custody_id' => $this->custody_id,
            'custody_num' => $this->custody_num,
            'custody_date' => $this->custody_date,

        ];
    }
}
