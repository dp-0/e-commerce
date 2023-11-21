<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'voucher_amount',
        'purchase_amount',
        'valid_up_to',
        'status'
    ];

    protected $casts = [
        'valid_up_to' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($voucher) {
            $voucher->code = Str::random(8);
        });
    }
}
