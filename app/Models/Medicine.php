<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'name',
        'type',
        'description',
        'price',
        'stock',
        'image',
        'sold',
        'slug',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($medicine) {
            if (empty($medicine->slug)) {
                $medicine->slug = Str::slug($medicine->name);
            }
        });
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
