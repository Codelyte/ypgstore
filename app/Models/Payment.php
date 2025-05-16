<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

     protected $fillable = [
        'order_id',
        'inventory_id',
        'granted_at',
    ];

    /**
     * Get the order that this payment belongs to.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the inventory item associated with this payment.
     */
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
