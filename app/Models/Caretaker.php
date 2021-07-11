<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Job_offers;
use App\Models\Review_relation;
use App\Models\Review;
use App\Models\Notification;
use App\Models\Profession_caretaker_relation;
use App\Models\Profession;
use App\Models\Region_caretaker_relation;
use App\Models\Region;

class Caretaker extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function getAgeAttribute()
    {
        return \Carbon\Carbon::parse($this->user->tanggal_lahir)->age;
    }

    public function jobOffers()
    {
        return $this->hasMany(Job_offers::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function professionCaretakerRelation()
    {
        return $this->hasMany(Profession_caretaker_relation::class, 'caretaker_id', 'caretaker_id');
    }
    public function regionCaretakerRelation()
    {
        return $this->hasMany(Region_caretaker_relation::class, 'caretaker_id', 'caretaker_id');
    }

    protected $table = "Caretakers";

    protected $fillable = [
        'caretaker_status',
        'approved',
        'kode_bank',
        'bank_account',
        'cost_per_hour',
        'umur',
        'edukasi',
        'religi',
        'tinggi',
        'berat',
        'deskripsi_caretaker',
        'pengawasan_kamera',
        'takut_anjing',
        'NIK',
        'dokumen_vaksin_path',
        'dokumen_ijazah_path',
        'dokumen_psikotes_path',
        'dokumen_akta_kelahiran_path',
    ];

    protected $attributes = [
        'rating_caretaker' => 0.0,
        // 'umur' => ,
    ];

    protected $primaryKey = 'caretaker_id';
}