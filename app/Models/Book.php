<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
   
    use HasFactory;

    public function user(){
        return $this->belongsTo("App\Models\User");
    }

    public function wishes(){
        return $this->hasMany('App\Models\Wish');
    }
    public function to_reads(){
        return $this->hasMany('App\Models\ToRead');
    }
    public function chroniques(){
        return $this->hasMany('App\Models\Chronique');
    }
    public function readings(){
        return $this->hasMany('App\Models\Reading');
    }

    public function toString()
    {
        return $this->title; 
    }

    public function image()
    {
        return $this->thumbnail; 
    }

    protected $fillable=['title'];
}
