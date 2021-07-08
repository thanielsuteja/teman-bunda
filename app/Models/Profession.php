<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profession extends Model
{
    use HasFactory;

    protected $fillable = [
        'profession_name',
        'profession_desc',
    ];

    protected $primaryKey = 'profession_id';

    
    public function ProfessionCaretakerRelation()
    {
        return $this->hasMany(RegionCaretakerRelation::class, 'profession_id', 'profession_id');
    }

}
