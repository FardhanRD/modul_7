<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Penjual extends Authenticatable
{
    use Notifiable;

    
    protected $guard = 'penjual';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
