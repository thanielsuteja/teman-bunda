<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caretaker extends Model
{
    use HasFactory;

    protected $fillable = [
        'caretaker_status',
        'approved',
        'user_id',
        'cost_per_hour',
        'umur',
        'edukasi',
        'religi',
        'tinggi',
        'berat',
        'deskripsi_caretaker',
        'NIK',
        'dokumen_vaksin_path',
        'dokumen_ijazah_path',
        'dokumen_psikotes_path',
        'dokumen_akta_kelahiran_path',
        'rating_caretaker',
 
    ];

    protected $attributes = [
        'bank_account'=>"999999999999",
        'kode_bank'=>"999999999999",
        'caretaker_status'=>"inactive",
        'approved'=>"pending",
    ];

    protected $casts =[
        'pengawasan_kamera',
        'takut_anjing',
    ];

    protected $primaryKey = 'caretaker_id';

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function RegionCaretakerRelation()
    {
        return $this->hasMany(RegionCaretakerRelation::class, 'caretaker_id', 'caretaker_id');
    }

    public function ProfessionCaretakerRelation()
    {
        return $this->hasMany(ProfessionCaretakerRelation::class, 'caretaker_id', 'caretaker_id');
    }
}
