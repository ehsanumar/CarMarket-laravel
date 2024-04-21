<?php

namespace App\Models;

use App\Models\Cars;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sales extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_id',
        'buyer_id',
        'seller_id',
        'price',
    ];

    public function cars(): BelongsTo
    {
        return $this->belongsTo(Cars::class,'car_id');
    }
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }
    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

}
