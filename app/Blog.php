<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Blog extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'title', 'description', 'image', 'author',
    ];

    // public function users()
    // {
    //     return $this->belongsToMany(User::class)->withPivot(['comment']);
    // }

    // One Blog Can Have Multiple Comments.
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    //One Blog Can Only Belongs to One User.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
