<?php

/**
 * Created by SmartCoder Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AlbumImage
 *
 * @property int $id
 * @property int $album_image_id
 * @property string $image
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Album $album
 *
 * @package App\Models
 */
class AlbumImage extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $table = 'album_images';

    protected $casts = [
        'album_image_id' => 'int'
    ];

    protected $fillable = [
        'album_image_id',
        'image'
    ];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_image_id');
    }

    public function getImageAttribute()
    {
        return asset("uploads/albumImages/{$this->attributes['image']}");
    }
}
