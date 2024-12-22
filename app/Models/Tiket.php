<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $table = 'tiket';

    protected $primaryKey = 'id_tiket';

    protected $fillable = [
        'id_tipe_tiket',
        'id_pesanan_tiket',
        'tanggal_kunjungan',
        'berlaku_sampai',
        'jumlah_tiket',
        'harga_per_unit',
        'status' // aktif, telah digunakan, kadaluarsa

    ];

    // Relation to PesananTiket (many to one)
    public function pesananTiket()
    {
        return $this->belongsTo(PesananTiket::class, 'id_pesanan_tiket');
    }

    // Relation to TipeTiket (many to one)
    public function tipeTiket()
    {
        return $this->belongsTo(TipeTiket::class, 'id_tipe_tiket');
    }
}
