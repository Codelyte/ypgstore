<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;

    protected $primaryKey = 'product_id';
    
    protected $fillable = ['title', 'description', 'price_ngn', 'product_image', 'is_active'];


    public function inventories() {
        return $this->hasMany(Inventory::class);
    }

    protected $casts = [
    'is_active' => 'boolean',
    ];
}
