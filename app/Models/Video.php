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
 * Class Video
 *
 * @property int $id
 * @property string $name
 * @property Carbon $video_date
 * @property string $video
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Video extends Model
{
 use HasFactory;

	use SoftDeletes;
	protected $table = 'videos';

	protected $dates = [
		'video_date'
	];

	protected $fillable = [
		'name',
		'video_date',
		'video',
		'image'
	];

    public function getVideoAttribute()
    {
        return asset("/uploads/videos/{$this->attributes['video']}");
    }

    public function getImageAttribute()
    {
        return asset("/uploads/videosImage/{$this->attributes['image']}");
    }
}
