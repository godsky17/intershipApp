<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntershipUpdateRequest;
use App\Mail\AcceptedIntershipMail;
use App\Mail\RefusedIntershipMail;
use App\Models\Intership;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class IntershipController extends Controller
{
    public function index()
    {
        
        return view('administration.intership.index', [
            'interships' => $interships = Intership::where('status_id', 1)->where('achieved', 0)->with('user')->paginate(10)
        ]);
    }

    public function show(Intership $intership)
    {
        return view('administration.intership.show', [
            'intership' => $intership
        ]);
    }

    public function accepted(Intership $intership)
    {
        //Modifier le statut de la demande
        $status = Status::where('name', 'Accepter')->first();
        $intership->status_id = $status->id;
        $save_change_status = $intership->save();

        //Modifier le role ou non de l'utilisateur
        $role = Role::where('name', 'Stagiaire')->first();
        $user = User::where('id', $intership->user_id)->first();
        $user->role_id = $role->id;
        
        //generer un mot de passe aleatoir pour le nouveau compte
        $pwd = $user->last_name ."_" . $user->id;
        $user->password = Hash::make($pwd);
        $save_role = $user->save();

        //Envoyer le mail
        $send_mail = Mail::send(new AcceptedIntershipMail($user->email, $user->getName(),"",$pwd));

        //verification et retour
        if ($save_change_status && $save_role && $send_mail) {
           $user_name = $user->getName() . " est desormais un stagiair.";
            return to_route('administration.intership.index')->with('success', $user_name);
        }
    }

    public function refused(Intership $intership)
    {
        //Modifier le statut de la demande
        $status = Status::where('name', 'Rejeter')->first();
        $intership->status_id = $status->id;
        $save_change_status = $intership->save();

        //envoi de mail pour notifier
        $user = User::where('id', $intership->user_id)->first();
        $send_mail = Mail::send(new RefusedIntershipMail($user->email, $user->getName()));

        //verification et retour
        if ($save_change_status && $send_mail) {
            $user_name = "La demande de " . $user->getName() . " a ete rejeter avec succes.";
             return to_route('administration.intership.index')->with('success', $user_name);
         }
    }

    public function achieved(Intership $intership)
    {
        //modifier l'attribut corbeille
        $intership->achieved = 1;
        $intership->save();
        $user = User::where('id', $intership->user_id)->first();
        if ($intership->save()) {
            $user_name = "La demande de " . $user->getName() . " a ete achive avec succes.";
             return to_route('administration.intership.index')->with('success', $user_name);
         }
    }

    public function showIntershipList()
    {
        $role_stagiaire = Role::where('name', 'Stagiaire')->first();
        return view('administration.intership.list', [
            'interships' => User::where('role_id', $role_stagiaire->id)->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
