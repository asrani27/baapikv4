<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManualBook extends Model
{
    use HasFactory;
    protected $table = 'manual_book';
    protected $guarded = ['id'];

    public $timestamps = false;
}
