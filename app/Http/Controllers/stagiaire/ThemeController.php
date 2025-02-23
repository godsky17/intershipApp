<?php

namespace App\Http\Controllers\stagiaire;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThemeRequest;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Type\VoidType;

class ThemeController extends Controller
{
    public function index() : View
    {
        return view('stagiaire.theme.index', [
            'themes' => Auth::user()->themes
        ]);
    }

    public function create() : View
    {
        return view('stagiaire.theme.form', [
            'theme' => new Theme()
        ]);
    }

    /**
     * Enregistre dans la base de donnee un theme.
     * @param ThemeRequest $request
     * @var array $data Les donnees valide provenant du formulaire de creation de theme.
     * @var date $date_now Date du jour.
     * @var date $seven_day_ago c'est la date il y a sept jours en arriere. 
     */
    public function store(ThemeRequest $request) : RedirectResponse  
    {
        $datas = $request->validated();
        $date_now = date('Y-m-d');
        if ($datas['date'] <= $date_now) {
            return back()->withErrors(['date' => "Date invalide !"]);
        }

        $theme_of_user =  Auth::user()->themes()->get();
        $last_theme = $theme_of_user[count($theme_of_user) - 1];

        if($last_theme->statut() == "A venir" && $last_theme->is_validate() == "En attente")
        {
            return back()->with('error', "Vous n'etes pas autorisee a effectuee cette operation pour le moment.");
        }

        //Notifier au superviseur qu'il y a un nouveua theme qui est proposer
        $theme_id = Theme::create($request->validated());
        Auth::user()->themes()->attach($theme_id);
        return to_route('stagiaire.theme.index')->with('success', "Theme enregister !");
    }

    public function update(Theme $theme){
        return view('stagiaire.theme.form', [
            'theme' => $theme
        ]);
    }

    public function saveUpdate(ThemeRequest $request, Theme $theme)
    {
        if($theme->is_validate() === "Valider"){
            return to_route('stagiaire.theme.index')->with('error', "Impossible d'effectuer cette operation");
        }
        
        $date_now = date('Y-m-d');
        if ($request->validated('date') <= $date_now) {
            return back()->withErrors(['date' => "Date invalide !"]);
        }

        $theme->update($request->validated());
        return to_route('stagiaire.theme.index')->with('success', "Theme modifier avec succes !");
    }

    public function achieved(Theme $theme)
    {
        $theme->achieved = 1;
        $theme->save();
        return to_route('stagiaire.theme.index')->with('success', "Theme achiver avec success !");
    }

    public function delete(Theme $theme)
    {
        $theme->delete();
        return to_route('stagiaire.theme.index')->with('success', "Theme achiver avec success !");
    }
}
