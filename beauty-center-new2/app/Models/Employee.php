<?php

// app\Models\Employee.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_Employe'; // Define the primary key

    protected $fillable = [
        'name',
        'numero_telephone',
        'email',
        'service',
        'image',
        // Add other columns if necessary
    ];

    // You can define relationships, scopes, or other methods here if needed
}
