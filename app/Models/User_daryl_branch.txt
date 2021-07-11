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
        'nama_depan',
        'nama_belakang',
        'password',
        'profile_img_path',
        'tanggal_lahir',
        'jenis_kelamin',
        'nomor_telepon',
        'email',
        'alamat',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'dokumen_ktp_path',
        'virtual_account',
        'rating_user',
    ];

    protected $attributes = [
        'role' => "user",
        'virtual_account' => "999999999999",
    ];

    protected $primaryKey = 'user_id';

    protected $hidden = [
        'password',
    ];

    public function Caretaker()
    {
        return $this->hasOne(Transaction::class,'user_id','user_id');
    }
}
