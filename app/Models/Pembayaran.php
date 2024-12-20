<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_pesanan',
        'metode_pembayaran',
        'bukti_pembayaran',
        // 'status', // dimatikan karena business logic otomatis harus mengirim bukti pembayaran sebelum
        'dibuat_saat'
    ];

    // Relation to PesananTiket (many to one)
    public function pesananTiket()
    {
        return $this->belongsTo(PesananTiket::class, 'id_pesanan');
    }
}
