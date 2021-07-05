<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    public function messages(){
        return $this->belongsTo("App\Models\Message");
    }
    use HasFactory;
}
