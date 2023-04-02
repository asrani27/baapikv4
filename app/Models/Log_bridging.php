<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log_bridging extends Model
{
    use HasFactory;
    protected $table = 'log_bridging';
    protected $guarded = ['id'];
}
