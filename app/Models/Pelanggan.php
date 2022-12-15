<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'pelanggan';
    protected $fillable = ['nama_pelanggan', 'no_ktp', 'alamat_pelanggan', 'motor_id', 'user_id'];

    public function detail_service()
    {
        return $this->hasMany(DetailService::class);
    }

    /**
     * Get the user that owns the Pelanggan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the motor that owns the Pelanggan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function motor()
    {
        return $this->belongsTo(Motor::class, 'motor_id', 'id');
    }
}
