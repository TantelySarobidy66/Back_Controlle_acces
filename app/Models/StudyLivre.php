<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyLivre extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_StudyLivre';
    protected $fillable = [
        'id_Etudiant',
        'titre',
        'auteur',
        'genre',
        'date',
        'heure_Entrer',
        'heure_Sortie',
    ];
    public function etudiant(){
        return $this->belongsTo(Etudiant::class, 'id_Etudiant');
    }
}
