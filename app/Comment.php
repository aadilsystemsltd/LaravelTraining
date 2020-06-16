<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use Notifiable;

    protected $fillable = [
        'user_id', 'blog_id', 'comment',
    ];

    //One Comment Can Belong To One Blog.
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    //Same as the case of comment to blog. One Comment can belong to only one user.
    public function user()
    {
        return $this->belongsTo(Blog::class);
    }
}
