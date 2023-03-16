<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    /**
     * Relation avec le modèle Utilisateur (plusieurs-à-un)
     */
    public function utilisateur(){
        return $this->belongsTo(Utilisateur::class);
    }
}
