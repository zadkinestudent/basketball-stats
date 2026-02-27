<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
        'position',
        'user_id', // Zorg dat dit aanwezig is voor relatie
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}