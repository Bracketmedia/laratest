<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FullSearch;

class Comment extends Model
{
    use FullSearch;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment', 'user_id',
    ];

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
