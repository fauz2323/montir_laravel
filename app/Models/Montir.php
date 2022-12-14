<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Montir extends Model
{
    public function scopeLock($request)
{
    return $request->where('montir', 0)->update(['montir', 1]);
}
    use HasFactory;

    protected $table = 'montir';
}
