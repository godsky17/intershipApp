<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intership extends Model
{
    /** @use HasFactory<\Database\Factories\IntershipFactory> */
    use HasFactory;

    protected $fillable = [
        'last_graduate',
        'last_graduate_date',
        'last_graduate_school',
        'skills',
        'new_skills',
        'pair',
        'pairName',
        'computer',
        'status_id',
        'achieved',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function is_pair(){
        return $this->pair ? "Oui" : "Nom";
    }

    public function have_computer()
    {
        return $this->computer ? "Oui" : "Nom";
    }
}
