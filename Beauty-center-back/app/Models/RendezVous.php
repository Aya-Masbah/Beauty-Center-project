<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;
    protected $table = 'rendez_vouses'; // Nom de la table dans la base de données

    protected $primaryKey = 'id_Rendezvous'; // Nom de la clé primaire

    protected $fillable = [
        'id_Client',
        'id_Employe',
        'id_Service',
        'date_rendezvous',
        'statut',
        // Ajoutez d'autres colonnes si nécessaire
    ];

    // Vous pouvez ajouter des relations avec d'autres modèles ici, si nécessaire

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_Client', 'ID_Client');
    }

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'id_Employe', 'id_Employe');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'id_Service', 'id_Service');
    }
}
