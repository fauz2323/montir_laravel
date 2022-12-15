<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'motor';
    protected $fillable = ['jenis_motor', 'nomor_motor', 'merek_motor', 'user_id'];

    /**
     * Get the user that owns the Motor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the pelanggan associated with the Motor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class, 'motor_id', 'id');
    }
}
