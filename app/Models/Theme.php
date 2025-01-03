<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Indique si le theme est valider par un administrateur ou non.
     */
    public function is_validate()
    {
        return $this->validate ? "Valider" : "En attente";
    }

    /**
     * Indique si le theme est deja presenter ou pas.
     * @return void
     */
    public function statut()
    {
        //Determination de la date actuelle
        $date_now = date("Y-m-d H:i:s");

        //comparaison de la date actuelle  a la date de presentation
        if($this->date > $date_now){
            return "A venir";
        }else if($this->date = $date_now){
            return "En cours";
        }else{
            return "Deja passer";
        }
        
        
    }
}
