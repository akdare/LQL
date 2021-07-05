<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediteur extends Model
{
    use HasFactory;


      
    public function messages(){
        return $this->hasMany('App\Models\Message');
    }

    public function toString()
    {
        return $this->name; 
    }

   


    //Session::flash('success', 'Rechargement effectué avec succès.');

    //return redirect()->route('recharges.index', compact ('recharges'));
}
