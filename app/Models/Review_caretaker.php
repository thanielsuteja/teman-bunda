<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job_offers;

class Review_caretaker extends Model
{
    use HasFactory;

    public function job() {
        return $this->belongsTo(Job_offers::class);
    }
}
