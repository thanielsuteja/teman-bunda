<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job_offer;

class Review_user extends Model
{
    use HasFactory;

    public function job() {
        return $this->belongsTo(Job_offer::class);
    }
}
