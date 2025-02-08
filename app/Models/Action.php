<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_Action';
    protected $fillable = [
        'id_Etudiant',
        'date',
        'heure_Entrer',
        'heure_Sortie',
    ];

    public function etudiant(){
        return $this->belongsTo(Etudiant::class, 'id_Etudiant');
    }
}
