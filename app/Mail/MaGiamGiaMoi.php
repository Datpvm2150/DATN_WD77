<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MaGiamGiaMoi extends Mailable
{
    use Queueable, SerializesModels;

    public $voucherCode;
    public $voucher;

    public function __construct($voucherCode, $voucher)
    {
        $this->voucherCode = $voucherCode;
        $this->voucher = $voucher;
    }

    public function build()
    {
        return $this->subject('Bạn nhận được mã giảm giá!')
            ->view('emails.voucher')
            ->with([
                'voucherCode' => $this->voucherCode,
                'phanTram' => $this->voucher->phan_tram_khuyen_mai,
                'giamToiDa' => $this->voucher->giam_toi_da,
                'ngayHetHan' => $this->voucher->ngay_ket_thuc->format('d/m/Y'),
            ]);
    }
}

