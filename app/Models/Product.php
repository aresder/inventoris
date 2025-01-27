<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'status', 'name', 'description', 'price', 'quantity', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->code)) {
                $product->code = 'P' . str_pad(Product::count() + 1, 4, '0', STR_PAD_LEFT);
            }
        });
    }
}
