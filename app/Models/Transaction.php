<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job_offers;

class Transaction extends Model
{
    use HasFactory;

    public function jobOffer() {
        return $this->belongsTo(Job_offers::class);
    }

    protected $table = "Transactions";
}
