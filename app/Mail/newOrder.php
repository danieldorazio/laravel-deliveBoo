<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class newOrder extends Mailable
{
    use Queueable, SerializesModels;

    // public $cart;
    public $order;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_order)
    {
        // $this->cart = $_cart;
        $this->order = $_order;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            // replyTo: $this->order->email,
            subject: 'New Order',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.new-order-email',
            with: [
                'orderName' => $this->order->client_name,
                'orderDate' => $this->order->delivery_time,
                'orderAddress' => $this->order->delivery_address,
                'orderPhone' => $this->order->client_phone,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
