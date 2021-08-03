<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_number',
        'user_id',
        'delivery_address',
        'total_items',
        'total_excl',
        'total_delivery',
        'total_vat',
        'total_due',
        'status'
    ];

    public function items()
    {
        return $this->belongsToMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
