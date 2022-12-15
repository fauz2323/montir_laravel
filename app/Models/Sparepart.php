<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'spare_part';
    protected $fillable = ['nama_sparepart','stok', 'merek','qty', 'harga', 'suppliyer_idsuppliyer'];

    public function detail_service(){
        return $this->hasMany(DetailService::class);
    }
}
