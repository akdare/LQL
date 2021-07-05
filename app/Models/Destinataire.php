<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinataire extends Model
{
    public function messages(){
        return $this->hasMany('App\Models\Message');
    }

    public function toString()
    {
        return $this->name; 
    }

    use HasFactory;
}
