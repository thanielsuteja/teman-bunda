<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Region_caretaker_relation;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_name',
    ];

    public function RegionCaretakerRelation() {
        return $this->hasMany(Region_caretaker_relation::class, 'region_id', 'region_id');
    }

    protected $primaryKey = 'region_id';
}