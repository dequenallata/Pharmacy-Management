<?php

namespace App;
use Jenssegers\Mongodb\Auth\PasswordResetServiceProvider;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class User extends Eloquent implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Notifiable;
    use Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $collection="user";
    protected $guearded = ['_id'];

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}