<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeService extends Model
{
    use HasFactory;
    protected $table = 'type_services'; // Nom de la table dans la base de données

    protected $primaryKey = 'id_TypeService'; // Nom de la clé primaire

    protected $fillable = [
        'nomTypeService',
        'description',
        // Ajoutez d'autres colonnes si nécessaire
    ];

    // Relation avec les services
    public function services()
    {
        return $this->hasMany(Service::class, 'id_TypeService', 'id_TypeService');
    }
}
