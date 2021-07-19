<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job_offer;

class Transaction extends Model
{
    use HasFactory;
    
    public function JobOffer() {
        return $this->belongsTo(Job_offer::class,'job_id','job_id');
    }
    protected $fillable = [
        'transaction_status',
        'job_id',
        'transaction_ammount',
        'transaction_due',
        'payment_date',
        'bank_account',
        'virtual_account',
    ];

    protected $attributes = [
        'virtual_account' => "1234567899"
    ];

    protected $primaryKey = 'transaction_id';

}