<?php
namespace App\Mail;

use Carbon\Traits\Serialization;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceCreated extends Mailable
{
    use Queueable,SerializesModels;
    public $hoaDon;

    public function __construct($hoaDon)
    {
        $this->hoaDon = $hoaDon;
    }

    public function build(){
        return $this->subject('Xác nhận đặt hàng')
        ->view('email.invoice_created')
        ->with([
            'hoaDon'=>$this->hoaDon->load('chiTietHoaDons.bienTheSanPham.sanPham'),
        ]);
    }
   
}