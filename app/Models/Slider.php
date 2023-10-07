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
 * Class Slider
 *
 * @property int $id
 * @property string $image
 * @property string|null $url
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Slider extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'sliders';
    protected static $logName = 'sliders';

    protected $fillable = ['title', 'content','url', 'image'];
    protected static $logAttributes = ['name', 'image'];


    public function getImageAttribute()
    {
        return asset("/uploads/sliders/{$this->attributes['image']}");
    }

}
