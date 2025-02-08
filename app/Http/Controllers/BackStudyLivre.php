<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyLivre;
use App\Models\Book;
use App\Models\Etudiant;

class BackStudyLivre extends Controller
{
    public function selectStudyLivre() {
        $studyLivre = StudyLivre::orderBy('id_StudyLivre','desc')->with('etudiant')->get();
        return response()->json(['studyLivre' => $studyLivre]);
    }

    public function selectDateAmizaoDaty($dat) {
        $listAction = StudyLivre::orderBy('id_StudyLivre','desc')->with('etudiant')->where('date',$dat)->get();
        return response()->json(['listAction' => $listAction]);
    }

    public function ajoutStudyLivre(Request $champ) {
        StudyLivre::create([
            'id_Etudiant'=>$champ->id,
            'titre'=>$champ->titre,
            'auteur'=>$champ->auteur,
            'genre'=>$champ->genre,
            'date'=>$champ->date_Actuel,
            'heure_Entrer'=>$champ->heure_Entrer,
            'heure_Sortie'=>0,
        ]);
        return response()->json(['message', 'Tafifitra ho mamaky boky ianao!']);
    }

    public function modifiStudyLivre(Request $champ) {
        StudyLivre::where('id_StudyLivre', $champ->id)->update([
            'heure_Sortie'=>$champ->heure_Sortie,
        ]);
        return response()->json(['message','Voaova ny info ny hamaky boky']);
    }
}
