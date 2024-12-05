<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SosialMedia
 *
 * @property int $id_sosial_media
 * @property string $link_sosial_media
 * @property int $id_tempat_wisata
 * @property int $tipe_sosial_media
 *
 * @property TempatWisata $tempat_wisata
 * @property PlatformSosialMedia $platform_sosial_media
 *
 * @package App\Models
 */
class SosialMedia extends Model
{
	protected $table = 'sosial_media';
	protected $primaryKey = 'id_sosial_media';
	public $timestamps = false;

	protected $casts = [
		'id_tempat_wisata' => 'int',
		'tipe_sosial_media' => 'int'
	];

	protected $fillable = [
		'link_sosial_media',
		'id_tempat_wisata',
		'tipe_sosial_media'
	];

	public function tempat_wisata()
	{
		return $this->belongsTo(TempatWisata::class, 'id_tempat_wisata');
	}

	public function platform_sosial_media()
	{
		return $this->belongsTo(PlatformSosialMedia::class, 'tipe_sosial_media');
	}
}
