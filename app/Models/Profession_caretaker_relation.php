<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Caretaker;
use App\Models\Profession;

class Profession_caretaker_relation extends Model
{
    use HasFactory;

    protected $fillable = [
        'profession_id',
        'caretaker_id',
    ];

    public function Profession() {
        return $this->belongsTo(Profession::class, 'profession_id', 'profession_id');
    }
    public function Caretaker() {
        return $this->belongsTo(Caretaker::class, 'caretaker_id', 'caretaker_id');
    }
}