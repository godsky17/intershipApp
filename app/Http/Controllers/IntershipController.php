<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntershipUpdateRequest;
use App\Mail\AcceptedIntershipMail;
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
        
        return view('intership.index', [
            'interships' => $interships = Intership::where('status_id', 1)->with('user')->paginate(10)
        ]);
    }

    public function show(Intership $intership)
    {
        return view('intership.show', [
            'intership' => $intership
        ]);
    }

    public function addToIntership(Intership $intership)
    {
        // $role = Role::where('name', 'Stagiaire')->first();
        // $status = Status::where('name', 'Accepter')->first();
        // //changement du statut de la demande
        // $intership->status_id = $status->id;
        // $save_change_status = $intership->save();
        // //changement du role de l'utilisateur
        // $user = User::where('id', $intership->user_id)->first();
        // $user->role_id = $role->id;
        // $save_role = $user->save();
        // if ($save_change_status && $save_role) {
        //    $user_name = $user->getName() . " est desormais un stagiair.";
        //     return to_route('intership.index')->with('success', $user_name);
        // }

        //Modifier le statut de la demande

        //Modifier le role ou non de l'utilisateur

        //generer un mot de passe aleatoir pour le nouveau compte

        //Envoyer le mail
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
            return to_route('intership.index')->with('success', $user_name);
        }
    }
}
