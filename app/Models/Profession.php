<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profession_caretaker_relation;

class Profession extends Model
{
    use HasFactory;

    protected $fillable = [
        'profession_name',
        'profession_desc',
    ];

    public function ProfessionCaretakerRelation() {
        return $this->hasMany(Profession_caretaker_relation::class, 'profession_id', 'profession_id');
    }

    protected $primaryKey = 'profession_id';
}