<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Caretaker;
use App\Models\Review_caretaker;
use App\Models\Review_user;

class Job_offer extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function caretaker(){
        return $this->belongsTo(Caretaker::class);
    }
    public function transaction(){
        return $this->hasOne(Transaction::class);
    }
    public function reviewUser(){
        return $this->hasOne(Review_user::class);
    }
    public function reviewCaretaker(){
        return $this->hasOne(Review_caretaker::class);
    }

    protected $table = "Job_offers";

    protected $fillable = [
        'judul_pekerjaan',
        'deskripsi_pekerjaan',
        'tanggal_masuk',
        'tanggal_berakhir',
        'jam_masuk',
        'jam_berakhir',
        'wd_1',
        'wd_2',
        'wd_3',
        'wd_4',
        'wd_5',
        'wd_6',
        'wd_7',
        'estimasi_biaya',
    ];

    protected $primaryKey = 'job_id';
}
