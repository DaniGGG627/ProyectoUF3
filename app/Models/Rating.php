<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    // Definir qué campos pueden ser asignados masivamente
    protected $fillable = [
        'user_id',
        'property_id',
        'rating',
        'comment'
    ];

    // Relación con Property (Una valoración pertenece a una propiedad)
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    // Relación con User (Una valoración pertenece a un usuario)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
