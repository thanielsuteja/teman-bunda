<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Caretaker;
use App\Models\Region;

class Region_caretaker_relation extends Model
{
    use HasFactory;

    public function caretaker() {
        return $this->belongsTo(Caretaker::class);
    }
    public function region() {
        return $this->belongsTo(Region::class);
    }
}
