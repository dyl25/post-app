<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }

    public function user(): HasOne {
        return $this->hasOne(User::class);
    }
}
