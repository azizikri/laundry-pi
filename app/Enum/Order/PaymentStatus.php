<?php
namespace App\Enum\Order;


enum PaymentStatus:string
{
    case PENDING = 'belum membayar';
    case UPLOADED = 'di upload';
    case VERIFIED = 'terverifikasi';
    case FAILED = 'gagal';
}
