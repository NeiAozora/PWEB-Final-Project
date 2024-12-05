<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TempatWisata
 *
 * @property int $id_tempat_wisata
 * @property string $nama
 * @property string|null $deskripsi
 * @property string $link_gmaps
 *
 * @property Alamat $alamat
 * @property Collection|Fasilitas[] $fasilitas
 * @property Collection|GambarTempatWisata[] $gambar_tempat_wisata
 * @property Collection|Kategoriwisata[] $kategori_wisata
 * @property Collection|SosialMedia[] $sosial_media
 * @property Collection|TipeTiket[] $tipe_tikets
 * @property Collection|Ulasan[] $ulasans
 *
 * @package App\Models
 */
class TempatWisata extends Model
{
	protected $table = 'tempat_wisata';
	protected $primaryKey = 'id_tempat_wisata';
	public $timestamps = false;

	protected $fillable = [
		'nama',
		'deskripsi',
		'link_gmaps'
	];

	public function alamat()
	{
		return $this->hasOne(Alamat::class, 'id_tempat_wisata');
	}

	public function fasilitas()
	{
		return $this->hasMany(Fasilitas::class, 'id_tempat_wisata');
	}

	public function gambar_tempat_wisata()
	{
		return $this->hasMany(GambarTempatWisata::class, 'id_tempat_wisata');
	}

	public function kategori_wisata()
	{
		return $this->hasMany(Kategoriwisata::class, 'id_tempat_wisata');
	}

	public function sosial_media()
	{
		return $this->hasMany(SosialMedia::class, 'id_tempat_wisata');
	}

	public function tipe_tiket()
	{
		return $this->hasMany(TipeTiket::class, 'id_tempat_wisata');
	}

	public function ulasan()
	{
		return $this->hasMany(Ulasan::class, 'id_tempat_wisata');
	}
}
