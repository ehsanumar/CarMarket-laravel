<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cars extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company',
        'model',
        'price',
        'year',
        'details',
        'image',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function comments() : HasMany{
        return $this->hasMany(Comments::class);
    }
}
