<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\FullSearch;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens;
    use Notifiable;
    use FullSearch;

    const ROL_SYSADMIN = 'sysadmin';
    const ROL_ADMIN = 'admin';
    const ROL_USER = 'user';
    const ROL_APIREST = 'apirest';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that name.
     *
     * @var array
     */
    protected $fillname = [
        'name'
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

    public function comments()
    {
      return $this->hasMany('App\Comment');
    }
}
