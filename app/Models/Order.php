<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total_price',
        'status',
    ];

    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the product that owns the order.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Get the product that owns the order.
     */
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function courier()
    {
        return $this->belongsTo(Courier::class);
    }
}
