<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Caretaker;
use App\Models\Region;

class Region_caretaker_relation extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_id',
        'caretaker_id',
    ];

    public function Caretaker() {
        return $this->belongsTo(Caretaker::class,'caretaker_id','caretaker_id');
    }
    public function Region() {
        return $this->belongsTo(Region::class,'region_id','region_id');
    }
}