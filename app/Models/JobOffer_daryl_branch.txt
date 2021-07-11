<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'caretaker_id',
        'judul_pekerjaan',
        'deskripsi_pekerjaan',
        'tanggal_masuk',
        'tanggal_berakhir',
        'jam_masuk',
        'jam_berakhir',
        'estimasi_biaya',
        'job_status',

    ];

    protected $attributes = [
        'job_status' => "pending",
        
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

    public function Transaction()
    {
        return $this->hasOne(Transaction::class,'job_id','job_id');
    }

}
