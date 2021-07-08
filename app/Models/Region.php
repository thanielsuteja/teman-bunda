<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_name',
    ];

    protected $primaryKey = 'region_id';

    public function RegionCaretakerRelation()
    {
        return $this->hasMany(RegionCaretakerRelation::class, 'region_id', 'region_id');
    }
}
