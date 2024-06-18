<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class passwordResetTokens extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'token',
        'created_at',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->hasOne(User::class, 'email', 'email');
    }

    // Scope to check the token and fetch the associated record
    public function scopeCheckToken($query, $token)
    {
        return $query->where('token', $token)->firstOrFail();
    }
}
