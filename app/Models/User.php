<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Caretaker;
use App\Models\Notification;
use App\Models\Job_offer;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    public function Caretaker()
    {
        return $this->hasOne(Caretaker::class,'user_id','user_id');
    }

    public function Notifications()
    {
        return $this->hasMany(Notification::class, 'user_id', 'user_id');
    }
    public function JobOffers()
    {
        return $this->hasMany(Job_offer::class, 'user_id', 'user_id');
    }
    
    protected $table = "Users";
    
    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'email',
        'password',
        'nomor_telepon',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'profile_img_path',
        'dokumen_ktp_path',
        'virtual_account',
    ];

    protected $attributes = [
        'rating_user' => 0.0,
        'role' => "user",
    ];

    protected $primaryKey = 'user_id';

    protected $hidden = [
        'password',
    ];
}