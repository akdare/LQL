<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


// These two come from Media Library
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable;
    use HasMediaTrait;



  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function books(){
        return $this->hasMany('App\Models\Book');
    }

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    public function post_texts(){
        return $this->hasMany('App\Models\PostText');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
    public function toString()
    {
        return $this->name; 
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
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
    }
    public function likes(){
        return $this->hasMany('App\Models\Like');
    }
    public function dislikes(){
        return $this->hasMany('App\Models\Dislike');
    }
}
