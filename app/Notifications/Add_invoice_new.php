<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\invoices;


class Add_invoice_new extends Notification
{
    use Queueable;
    private $invoices;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(invoices $invoices)
    {
        $this->invoices = $invoices;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDatabase($notifiable)
    {
        return [
           
            'id'=> $this->invoices->id,
            'title'=>'تمت اضافة فاتورة جديدة بواسطة',
            'user'=> Auth::user()->name,
           
        ];
    }
    
}
