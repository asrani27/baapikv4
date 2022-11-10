<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_anamnesa extends Model
{
    use HasFactory;
    protected $table = 't_anamnesa';
    protected $guarded = ['id'];

    public function dokter()
    {
        return $this->belongsTo(M_dokter::class, 'm_dokter_id');
    }
    public function sadar()
    {
        return $this->belongsTo(M_kesadaran::class, 'm_kesadaran_id');
    }
}
