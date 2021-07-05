<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function expediteur(){
        return $this->belongsTo("App\Models\Expediteur");
    }

    public function destinataire(){
        return $this->belongsTo("App\Models\Destinataire");
    }

    public function reponses(){
        return $this->hasMany('App\Models\Reponse');
    }

    use HasFactory;
}
