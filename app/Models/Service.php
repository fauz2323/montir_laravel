<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'service';
    protected $fillable = ['nama_service', 'harga_service'];

    public function detail_service(){
        return $this->hasMany(DetailService::class);
    }
}
