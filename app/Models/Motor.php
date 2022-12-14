<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'motor';
    protected $fillable = ['id', 'jenis_motor', 'nomor_motor', 'merek_motor'];
}
