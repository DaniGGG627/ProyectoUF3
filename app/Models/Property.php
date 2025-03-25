<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    // Permitir la asignación masiva de estos campos
    protected $fillable = [
        'title',
        'description',
        'price',
        'type',
        'location',
        'user_id',
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}

