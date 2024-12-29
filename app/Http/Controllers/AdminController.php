<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCreateRequest;
use App\Mail\WelcomeAdminMail;
use App\Models\Admin;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'admins' => Admin::paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.form', [
            'admin' => new Admin(),
            'roles' => Role::get()
        ]);
    }

    public function store(AdminCreateRequest $request)
    {
        try {
            $data = $request->validated();
            //generation d'un mot de passe aleatoire
            $pwd = $data['first_name']."_".rand(10,100);
            $data['password'] = Hash::make($pwd);

            //enregistrement de l'admin
            $save_admin = Admin::create($data);
            //envoi de mail
            $name = $data['last_name'] . " " . $data['first_name'];
            $email = $data['email'];
            $send_mail = Mail::send(new WelcomeAdminMail($name, $email, $pwd));
            //verification et retour
            if($save_admin && $send_mail)
            {
                return to_route('admin.index')->with('success', "L'ajout de $name en tant qu'administrateur a ete fait avec succes.");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
