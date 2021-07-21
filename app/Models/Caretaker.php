<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Job_offer;
use App\Models\Notification;
use App\Models\Profession_caretaker_relation;
use App\Models\Region_caretaker_relation;

class Caretaker extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function getAgeAttribute()
    {
        return \Carbon\Carbon::parse($this->User->tanggal_lahir)->age;
    }
    public function getMeanRatingAttribute()
    {
        $count = $this->jobOffers->reduce(function ($total, $jobOffer) {
            return $total + ($jobOffer->ReviewUser== null ? 0 : 1);
        }, 0);
        $total = $this->jobOffers->reduce(function ($total, $jobOffer) {
            return $total + ($jobOffer->ReviewUser == null ? 0 : $jobOffer->ReviewUser->review_rating);
        }, 0);

        if ($count == 0) return 0;

        return doubleval($total / $count);
    }

    public function JobOffers()
    {
        return $this->hasMany(Job_offer::class, 'caretaker_id', 'caretaker_id');
    }
    public function Notifications()
    {
        return $this->hasMany(Notification::class, 'caretaker_id', 'caretaker_id');
    }

    public function ProfessionCaretakerRelation()
    {
        return $this->hasMany(Profession_caretaker_relation::class, 'caretaker_id', 'caretaker_id');
    }
    public function RegionCaretakerRelation()
    {
        return $this->hasMany(Region_caretaker_relation::class, 'caretaker_id', 'caretaker_id');
    }

    protected $table = "Caretakers";

    protected $fillable = [
        'user_id',
        'caretaker_status',
        'approved',
        'kode_bank',
        'bank_account',
        'cost_per_hour',
        'edukasi',
        'tipe_caretaker',
        'deskripsi_caretaker',
        'pengawasan_kamera',
        'takut_anjing',
        'NIK',
        'dokumen_vaksin_path',
        'dokumen_ijazah_path',
        'dokumen_psikotes_path',
        'dokumen_skck_path',
    ];

    protected $attributes = [
        'rating_caretaker'  => 0.0,
        'caretaker_status'  => 1,
        'approved'          => "pending",
        'pengawasan_kamera' => 0,
        // 'takut_anjing'      => 1,
    ];

    protected $casts =[
        'pengawasan_kamera'=>'boolean',
        'takut_anjing'=>'boolean',
    ];

    protected $primaryKey = 'caretaker_id';
    protected $appends = ['MeanRating', 'Age'];
}