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

    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Caretaker(){
        return $this->belongsTo(Caretaker::class);
    }
    public function Transaction(){
        return $this->hasOne(Transaction::class,'job_id','job_id');
    }
    public function ReviewUser(){
        return $this->hasOne(Review_user::class,'job_id','job_id');
    }
    public function ReviewCaretaker(){
        return $this->hasOne(Review_caretaker::class);
    }

    protected $table = "Job_offers";

    protected $fillable = [
        'user_id',
        'caretaker_id',
        'judul_pekerjaan',
        'deskripsi_pekerjaan',
        'tanggal_masuk',
        'tanggal_berakhir',
        'jam_masuk',
        'jam_berakhir',
        // 'wd_1',
        // 'wd_2',
        // 'wd_3',
        // 'wd_4',
        // 'wd_5',
        // 'wd_6',
        // 'wd_7',
        'estimasi_biaya',
        'job_status',
    ];

    protected $casts =[
        'wd_1'=>'boolean',
        'wd_2'=>'boolean',
        'wd_3'=>'boolean',
        'wd_4'=>'boolean',
        'wd_5'=>'boolean',
        'wd_6'=>'boolean',
        'wd_7'=>'boolean',  
    ];

    protected $primaryKey = 'job_id';

    protected $attributes = [
        'job_status' => "pending",
        
    ];
}