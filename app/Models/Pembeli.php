<?php

namespace App\Models;

// 1. PENTING: Import ini biar bisa login
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// 2. Ganti extends Model jadi Authenticatable
class Pembeli extends Authenticatable
{
    use HasFactory, Notifiable;

    // 3. Definisikan guard khusus pembeli
    protected $guard = 'pembeli';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
