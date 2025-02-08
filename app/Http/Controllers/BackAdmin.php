<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Action;
use App\Models\StudyLivre;
use App\Models\Etudiant;
use Carbon\Carbon;

class BackAdmin extends Controller
{
    public function login(Request $request)
    {
        $email = Admin::select('email')->first();
        $mdp = Admin::select('mdp')->first();
        if($email){
            if($mdp){
                if($email->email!=$request->email){
                    return response()->json(['message'=>'Email incorrect']);
                }elseif($mdp->mdp!=$request->mdp){
                    return response()->json(['message'=>'Mot de passe incorrect']);
                }else{
                    return response()->json(['message'=>'Vous êtes connecté']);
                }
            }
        }
    }

    // Statistique
    public function statistique(Request $request)
    {
        $today = Carbon::today();
        $form = $today->format("Y-m-d");

        $ENI1 = Action::whereHas('etudiant', function ($query) use ($form) {
            $query->where('filiere', 'ENI')
                  ->whereDate('date', $form);
        })->count();
        $ENI2 = StudyLivre::whereHas('etudiant', function ($query) use ($form) {
            $query->where('filiere', 'ENI')
                  ->whereDate('date', $form);
        })->count();
        $ENI = $ENI1 + $ENI2;

        $DEGS1 = Action::whereHas('etudiant', function ($query) use ($form){
            $query->where('filiere', 'DEGS')->whereDate('date', $form);
        })->count();
        $DEGS2 = StudyLivre::whereHas('etudiant', function ($query) use ($form){
            $query->where('filiere', 'DEGS')->whereDate('date', $form);
        })->count();
        $DEGS = $DEGS1 + $DEGS2;

        $SCIENCE1 = Action::whereHas('etudiant', function ($query) use ($form){
            $query->where('filiere', 'SCIENCE')->whereDate('date', $form);
        })->count();
        $SCIENCE2 = StudyLivre::whereHas('etudiant', function ($query) use ($form){
            $query->where('filiere', 'SCIENCE')->whereDate('date', $form);
        })->count();
        $SCIENCE = $SCIENCE1 + $SCIENCE2;

        $EMIT1 = Action::whereHas('etudiant', function ($query) use ($form){
            $query->where('filiere', 'EMIT')->whereDate('date', $form);
        })->count();
        $EMIT2 = StudyLivre::whereHas('etudiant', function ($query) use ($form){
            $query->where('filiere', 'EMIT')->whereDate('date', $form);
        })->count();
        $EMIT = $EMIT1 + $EMIT2;

        $FLSH1 = Action::whereHas('etudiant', function ($query) use ($form){
            $query->where('filiere', 'FLSH')->whereDate('date', $form);
        })->count();
        $FLSH2 = StudyLivre::whereHas('etudiant', function ($query) use ($form){
            $query->where('filiere', 'FLSH')->whereDate('date', $form);
        })->count();
        $FLSH = $FLSH1 + $FLSH2;

        $ISST1 = Action::whereHas('etudiant', function ($query) use ($form){
            $query->where('filiere', 'ISST')->whereDate('date', $form);
        })->count();
        $ISST2 = StudyLivre::whereHas('etudiant', function ($query) use ($form){
            $query->where('filiere', 'ISST')->whereDate('date', $form);
        })->count();
        $ISST = $ISST1 + $ISST2;

        $ISTE1 = Action::whereHas('etudiant', function ($query) use ($form){
            $query->where('filiere', 'ISTE')->whereDate('date', $form);
        })->count();
        $ISTE2 = StudyLivre::whereHas('etudiant', function ($query) use ($form){
            $query->where('filiere', 'ISTE')->whereDate('date', $form);
        })->count();
        $ISTE = $ISST1 + $ISST2;

        $MEDCINE1 = Action::whereHas('etudiant', function ($query) use ($form){
            $query->where('filiere', 'MEDCINE')->whereDate('date', $form);
        })->count();
        $MEDCINE2 = StudyLivre::whereHas('etudiant', function ($query) use ($form){
            $query->where('filiere', 'MEDCINE')->whereDate('date', $form);
        })->count();
        $MEDCINE = $MEDCINE1 + $MEDCINE2;

        return response()->json(['ENI' => $ENI,'DEGS' => $DEGS, 'SCIENCE' => $SCIENCE,'EMIT' => $EMIT,'FLSH' => $FLSH,'ISST' => $ISST,'ISTE' => $ISTE,'MEDCINE' => $MEDCINE]);
    }
   
}