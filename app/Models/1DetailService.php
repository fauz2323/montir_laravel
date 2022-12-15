<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailService extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'detail_service';
    protected $fillable = [
        'pelanggan_id',
        'service_id',
        'montir_id',
        'spare_part_id',
        'tanggal_service',
        'jam_masuk',
        'keluhan',
        'total_harga'
    ];

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function montir(){
        return $this->belongsTo(Montir::class);
    }
    public function spare_part(){
        return $this->belongsTo(Sparepart::class);
    }
    
}
