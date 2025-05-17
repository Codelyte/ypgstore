<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessGrant extends Model
{
    use HasFactory;

     protected $fillable = [
        'payment_id',
        'inventory_id',
        'granted_at',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
