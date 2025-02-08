<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class BackEdutiant extends Controller
{
    public function selectEtudiant() {
        $list = Etudiant::orderBy('id_Etudiant','desc')->get();
        return response()->json(['list'=>$list]);
    }

    public function ajoutEtudiant(Request $champ) {
        $deja = Etudiant::where('matricule', $champ->matricule)->first();
        if($deja){
            return response()->json(['message','Mandainga ianao']);
        } else{
            Etudiant::create([
                'nom'=>$champ->nom,
                'prenom'=>$champ->prenom,
                'matricule'=>$champ->matricule,
                'filiere'=>$champ->filiere,
                'niveau'=>$champ->niveau,
                'sexe'=>$champ->sexe,
            ]);
            return response()->json(['message'=>'Tafiditra ianao']);
        }
    }

    public function modifiEtudiant(Request $champ) {
        Etudiant::where('id_Etudiant', $champ->id)->update([
            'nom'=>$champ->nom,
            'prenom'=>$champ->prenom,
            'matricule'=>$champ->matricule,
            'filiere'=>$champ->filiere,
            'niveau'=>$champ->niveau,
            'sexe'=>$champ->sexe,
        ]);
        return response()->json(['message','Niova ny info-anao']);
    }

    public function suppEtudiant(Request $champ) {
        Etudiant::where('id_Etudiant', $champ->id)->delete();
        return response()->json(['message','Voafafa anao']);
    }
}
