<?php

namespace itsep;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
    public function subscribers() {
        return $this->hasMany('itsep\Models\Subscriber'); // у одного пользователя может быть много подключений
    }

    public function lists() {
        return $this->hasMany('itsep\Models\ListModel');
    }
}
