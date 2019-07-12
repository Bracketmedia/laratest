<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content', 'author_id', 'created_at', 'updated_at'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id', 'users');
    }
}
