<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    // Allow mass assignment for the following fields
    protected $fillable = [
        'product_id',
        'username',
        'password_encrypted',
        'extra_data_250kb',
    ];

    // Define the relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
