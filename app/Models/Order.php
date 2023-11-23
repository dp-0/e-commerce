<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'purcharseOrderId',
        'purchase_date_time',
        'purcharse_amount',
        'voucher_id',
        'offer_id',
        'user_id'
    ];

    protected $casts = [
        'purchase_date_time' => 'datetime'
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('amount');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
