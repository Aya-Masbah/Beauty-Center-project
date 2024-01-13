<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services'; // Nom de la table dans la base de données

    protected $primaryKey = 'id_Service'; // Nom de la clé primaire

    protected $fillable = [
        'id_TypeService',
        'nom_service',
        'description',
        'tarif',
        // Ajoutez d'autres colonnes si nécessaire
    ];

    // Relation avec le type de service
    public function typeService()
    {
        return $this->belongsTo(TypeService::class, 'id_TypeService', 'id_TypeService');
    }
}
