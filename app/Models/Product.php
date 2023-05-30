<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function stock()
    {
        return $this->hasOne(Stock::class, 'product_id')->withDefault(
            [
                'quantity' => 0,
            ]
        );
    }

    protected $appends = ['stock_value'];

    public function getStockValueAttribute()
    {
        return $this->stock->quantity * $this->price;
    }

}
