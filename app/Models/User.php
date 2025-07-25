<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    const ROLE_ADMIN = 'admin';
    const ROLE_GURU = 'guru';
    const ROLE_SISWA = 'siswa';
    const ROLE_STAFF = 'staff';

    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isGuru()
    {
        return $this->role === self::ROLE_GURU;
    }

    public function isSiswa()
    {
        return $this->role === self::ROLE_SISWA;
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
