<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Caretaker;
use App\Models\Profession;

class Profession_caretaker_relation extends Model
{
    use HasFactory;

    public function caretaker() {
        return $this->belongsTo(Caretaker::class);
    }
    public function profession() {
        return $this->belongsTo(Profession::class, 'profession_id');
    }
}
