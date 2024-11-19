<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockEntry extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'quantity', 'user_id'];

    // Relación con el modelo Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope para filtros avanzados
    public function scopeFilter($query, $filters)
    {
        return $query->when($filters['product_name'] ?? null, function ($query, $name) {
            $query->whereHas('product', function ($q) use ($name) {
                $q->where('name', 'like', '%' . $name . '%');
            });
        })
        ->when($filters['category'] ?? null, function ($query, $category) {
            $query->whereHas('product.category', function ($q) use ($category) {
                $q->where('name', 'like', '%' . $category . '%');
            });
        })
        ->when($filters['price'] ?? null, function ($query, $price) {
            $query->whereHas('product', function ($q) use ($price) {
                $q->where('price', '<=', $price);
            });
        });
    }
}
