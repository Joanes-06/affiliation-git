<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Souscription extends Model
{
    use HasFactory;

    // Définir les champs mass-assignable
    protected $fillable = [
        'user_id', 'amount', 'description', 'currency', 'status',
    ];

    // Définir la relation avec le modèle User (si nécessaire)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
