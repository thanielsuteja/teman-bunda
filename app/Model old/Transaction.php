<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job_offer;

class Transaction extends Model
{
    use HasFactory;

    public function jobOffer() {
        return $this->belongsTo(Job_offer::class);
    }

    protected $table = "Transactions";
}
