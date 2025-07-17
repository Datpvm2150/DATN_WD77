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
    public $discount;

    public function __construct($hoaDon,$discount=null)
    {
        $this->hoaDon = $hoaDon;
         $this->discount = $discount;
        
    }

    public function build(){
        return $this->subject('Xác nhận đặt hàng')
        ->view('emails.invoice_created')
        ->with([
            'hoaDon'=>$this->hoaDon->load('chiTietHoaDons.bienTheSanPham.sanPham'),
        ]);
    }
   
}