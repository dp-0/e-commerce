<?php

namespace App\Models;

use App\Enums\OfferStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'description',
        'offer_percentange',
        'status',
        'valid_up_to'
    ];

    protected $casts = [
        'valid_up_to' => 'datetime'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($voucher) {
            $voucher->status = OfferStatus::Available->value;
        });
    }
}
