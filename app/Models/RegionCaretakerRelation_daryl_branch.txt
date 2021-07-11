<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionCaretakerRelation extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_id',
        'caretaker_id',

    ];

    public function Region()
    {
        return $this->belongsTo(Region::class,'region_id','region_id');
    }

    public function Caretaker()
    {
        return $this->belongsTo(Caretaker::class,'caretaker_id','caretaker_id');
    }
}
