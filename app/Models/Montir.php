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

    public $timestamps = false;
    protected $table = 'montir';
    protected $fillable = ['nama','gender', 'alamat', 'nomor_telepon'];

    public function detail_service(){
        return $this->hasMany(DetailService::class);
    }
}
