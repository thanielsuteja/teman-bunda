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
    public function getTransactionStatusColorAttribute()
    {
        $colors = [
            'menunggu' => 'text-secondary',
            'ditolak' => 'text-danger',
            'ubah gaji' => 'text-primary',
            'berlangsung' => 'text-primary',
            'selesai' => 'text-success'
        ];
        return $colors[$this->transaction_status] ?? 'text-secondary';
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

    protected $primaryKey = 'transaction_id';

}