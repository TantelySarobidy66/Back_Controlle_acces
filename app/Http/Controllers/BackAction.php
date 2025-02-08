<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Action;
use App\Models\Etudiant;
use Carbon\Carbon;

class BackAction extends Controller
{
    public function selectActionEtudiant() {
        $listAction = Action::orderBy('id_Action','desc')->with('etudiant')->get();
        return response()->json(['listAction' => $listAction]);
    }

    public function selectDateAmizao($dat) {
      // $form = $dat->format("Y-m-d");
      $listAction = Action::with('etudiant')->where('date',$dat)->get();
      return response()->json(['listAction' => $listAction]);
    }

    public function ajoutActionEtudiant(Request $champ) {
      Action::create([
        'id_Etudiant'=>$champ->id,
        'date'=>$champ->date_Actuel,
        'heure_Entrer'=>$champ->heure_Entrer,
        'heure_Sortie'=>0,
      ]);
      return response()->json(['message','Tafiditra manao action ianao']);
    }

    public function modifiActionEtudiant(Request $champ) {
      Action::where('id_Action',$champ->id)->update([
        'heure_Sortie'=>$champ->heure_Sortie
      ]);
      return response()->json(['message', 'Niova ny info ny action anao']);
    }

}
