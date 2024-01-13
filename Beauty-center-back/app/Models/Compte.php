<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;
    protected $table = 'comptes'; // Nom de la table dans la base de données

    protected $primaryKey = 'id_Compte'; // Nom de la clé primaire

    protected $fillable = [
        'username',
        'password',
        'role',
    ];
    public function employes()
    {
        return $this->hasMany(Employe::class, 'id_Compte', 'id_Compte');
    }
}
