<?php

/**
 * Created by SmartCoder Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Album
 *
 * @property int $id
 * @property string $name
 * @property Carbon $album_date
 * @property string $description
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|AlbumImage[] $album_images
 *
 * @package App\Models
 */
class Album extends Model
{
 use HasFactory;

	use SoftDeletes;
	protected $table = 'albums';

	protected $dates = [
		'album_date'
	];

	protected $fillable = [
		'name',
		'album_date',
		'description',
        'imageAlbum'
	];

	public function album_images()
	{
		return $this->hasMany(AlbumImage::class, 'album_image_id');
	}

    public function getImageAlbumAttribute()
    {
        return asset("/uploads/albums/{$this->attributes['imageAlbum']}");
    }
}
