<?php

namespace App\Http\Controllers;

use App\Models\Rapport;
use App\Models\User;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    public function index()
    {
        return view('rapport.index', [
            'rapports' => Rapport::where('status_id', 1)->paginate(10),
        ]);
    }

    public function validated(Rapport $rapport)
    {
        $rapport->status_id = 5;
        if ($rapport->save()) {
            $user = User::where('id', $rapport->user_id)->first();
            return to_route('rapport.index')->with('success', "Rapport " . $rapport->title . " de " . $user->getName() . " a ete lu et approuvee");
        }

    }
}
