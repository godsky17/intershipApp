<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCreateRequest;
use App\Http\Requests\AdminUpdateRoleRequest;
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
        return view('administration.admin.index', [
            'admins' => Admin::orderBy('created_at', 'desc')->paginate(10),
            'roles' => Role::pluck('name', 'id')
        ]);
    }

    public function create()
    {
        return view('administration.admin.form', [
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

    public function goToUpdateRole(Admin $admin)
    {
        return view('administration.admin.form', [
            'admin' => $admin,
            'roles' => Role::pluck('name', 'id')
        ]);
    }

    public function updateRole(AdminUpdateRoleRequest $request, Admin $admin)
    {
        if ($request->validated('role_id') == 1 || $request->validated('role_id') == 2 ) {
            return back()->withErrors(['role_id'=> 'Impossible d\'attribuer ce role a cet utilisateur']);
        }

        $admin->update($request->validated());
        return to_route('admin.index')->with('success', "Le role a ete modifie avec succes.");

    }
}
