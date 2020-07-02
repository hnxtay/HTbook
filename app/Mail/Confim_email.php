<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Bill;
use App\Bill_detail;
class Confim_email extends Mailable
{
    use Queueable, SerializesModels;

    public $bill;
    public $billdetail = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Bill $bill,$billdetail)
    {
        $this->bill =  $bill;
        $this->billdetail = $billdetail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('page.checkout');
    }
}
