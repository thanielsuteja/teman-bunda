<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profession_caretaker_relation;

class Profession extends Model
{
    use HasFactory;

    public function relation() {
        return $this->hasMany(Profession_caretaker_relation::class);
    }
}
