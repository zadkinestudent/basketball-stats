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
        'age',
        'height',
        'weight',
        'college',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}