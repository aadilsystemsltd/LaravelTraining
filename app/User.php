<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','dob','image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function blogs()
    // {
    //     return $this->belongsToMany(Blog::class)->withPivot(['comment']);
    // }

    //One User Can Have Multiple Blogs.
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

     //One User Can Write Multiple Comment.
     public function comments()
     {
         return $this->hasMany(Blog::class);
     }
}
