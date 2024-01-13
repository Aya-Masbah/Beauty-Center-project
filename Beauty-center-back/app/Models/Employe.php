<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $table = 'employes'; // Nom de la table dans la base de données

    protected $primaryKey = 'id_Employe'; // Nom de la clé primaire

    protected $fillable = [
        'id_Compte',
        'nom',
        'prenom',
        'numero_telephone',
        'email',
        'competences',
        'horaires_travail',
        // Ajoutez d'autres colonnes si nécessaire
    ];

    // Vous pouvez ajouter des relations avec d'autres modèles ici, si nécessaire
    public function rendezVous()
    {
        return $this->hasMany(RendezVous::class, 'id_Employe', 'id_Employe');
    }

    // Relation avec la table 'comptes' (un employé appartient à un compte)
    public function compte()
    {
        return $this->belongsTo(Compte::class, 'id_Compte', 'id_Compte');
    }
}
