<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_pasien extends Model
{
    use HasFactory;
    protected $table = 'm_pasien';
    protected $guarded = ['id'];

    public function riwayat()
    {
        return $this->hasMany(T_pelayanan::class, 'm_pasien_id');
    }
}
