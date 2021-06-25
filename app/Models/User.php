<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'no_telepon',
        'email',
        'alamat',
        'provinsi',
        'kabupaten',
        'tanggal_lahir',
        'jenis_kelamin',
        'virtual_account',
    ];

    protected $attributes = [
        // 'alamat' => null,
        // 'provinsi' => null,
        // 'kabupaten' => null,
        'peran_user' => "user",
        'virtual_account' => "999999999999",
    ];

    protected $primaryKey = 'user_id';

    protected $hidden = [
        'password',
    ];
}
