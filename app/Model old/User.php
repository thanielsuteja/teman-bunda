<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Caretaker;
use App\Models\Notification;
use App\Models\Job_offer;
use App\Models\Review_relation;
use App\Models\Review;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    public function caretaker()
    {
        return $this->hasOne(Caretaker::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    public function jobOffers()
    {
        return $this->hasMany(Job_offer::class);
    }
    
    // public function reviewRelations()
    // {
    //     return $this->hasManyThrough(Review::class, Review_relation::class);
    // }
    
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
        // 'alamat' => null,
        // 'provinsi' => null,
        'rating_user' => 0.0,
        'role' => "user",
    ];

    protected $primaryKey = 'user_id';

    protected $hidden = [
        'password',
    ];
}
