<?php
namespace App\Enum\Order;


enum OrderStatus:string
{
    case PENDING = 'pending';
    case PROCESSING = 'di proses';
    case COURIER = 'kurir dalam perjalanan';
    case SHIPPING = 'di kirim';
    case DELIVERED = 'terkirim';
    case COMPLETED = 'selesai';
    case CANCELED = 'dibatalkan';
}
