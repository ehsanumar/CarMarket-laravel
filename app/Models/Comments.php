<?php

namespace App\Models;

use App\Models\Cars;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'car_id',
        'comment',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function cars(): BelongsTo
    {
        return $this->belongsTo(Cars::class);
    }

}
