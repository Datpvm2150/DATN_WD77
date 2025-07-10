<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Magiamgia extends Mailable
{
    use Queueable, SerializesModels;

    public $voucher;

    public function __construct($voucher)
    {
        $this->voucher = $voucher;
    }

    public function build()
    {
        return $this->subject('Bạn nhận được mã giảm giá từ cửa hàng')
                    ->view('emails.voucher'); 
    }
}
