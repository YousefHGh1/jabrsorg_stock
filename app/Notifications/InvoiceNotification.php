<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoiceNotification extends Notification
{
    use Queueable;

    private $invoice_id;
    private $voucher_no;
    private $voucher_date;


    public function __construct($invoice_id, $voucher_no, $voucher_date)
    {
        //
        $this->invoice_id = $invoice_id;
        $this->voucher_no = $voucher_no;
        $this->voucher_date = $voucher_date;

    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return [
            //
            'invoice_id' =>$this->invoice_id,
            'voucher_no' =>$this->voucher_no,
            'voucher_date' =>$this->voucher_date,

        ];
    }
}
