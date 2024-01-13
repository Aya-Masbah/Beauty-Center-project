<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients'; // Nom de la table dans la base de données

    protected $primaryKey = 'id_Client'; // Nom de la clé primaire

    protected $fillable = [
        'nom',
        'prenom',
        'numero_telephone',
        'email',
        // Ajoutez d'autres colonnes si nécessaire
    ];

    // Vous pouvez ajouter des relations avec d'autres modèles ici, par exemple, des rendez-vous liés à un client

    public function rendezVous()
    {
        return $this->hasMany(RendezVous::class, 'id_Client', 'id_Client');
    }
}
