<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExportNotification extends Notification
{
    use Queueable;

    private $export_id;
    private $export_voucher_no;
    private $export_voucher_date;


    public function __construct($export_id, $export_voucher_no, $export_voucher_date)
    {
        //
        $this->export_id = $export_id;
        $this->export_voucher_no = $export_voucher_no;
        $this->export_voucher_date = $export_voucher_date;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return [
            //
            'export_id' => $this->export_id,
            'export_voucher_no' => $this->export_voucher_no,
            'export_voucher_date' => $this->export_voucher_date,

        ];
    }
}
