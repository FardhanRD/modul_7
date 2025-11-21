<?php

namespace App\Models;

// 1. Import Authenticatable
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// 2. Ganti extends-nya
class Penjual extends Authenticatable
{
    use Notifiable;

    // 3. Definisikan guard-nya biar Laravel tau ini buat siapa
    protected $guard = 'penjual';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
