<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review_relation;

class Review extends Model
{
    use HasFactory;

    public function relation() {
        return $this->hasOne(Review_relation::class);
    }
}
