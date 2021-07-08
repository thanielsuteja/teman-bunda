<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_status',
        'job_id',
        'transaction_ammount',
        'transaction_due',
        'payment_date',
        'bank_account',
        'virtual_account',
    ];


    protected $primaryKey = 'transaction_id';

    public function JobOffer()
    {
        return $this->belongsTo(JobOffer::class,'job_id','job_id');
    }
}
