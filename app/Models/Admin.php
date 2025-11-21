<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // <--- PENTING
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admins'; // Pastikan nama tabel bener

    protected $fillable = [
        'name',
        'email',
        'password',
        'super_admin',
    ];
}
