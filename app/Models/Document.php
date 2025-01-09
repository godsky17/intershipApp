<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Document extends Model
{
    use HasFactory;


    protected $fillable = [
        'path',
        'recommandation',
        'theme_id',
        'user_id'
    ];

    public function casts() : array
    {
        return [
            'path' => 'string',
        ];
    }

    public function theme() : BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
