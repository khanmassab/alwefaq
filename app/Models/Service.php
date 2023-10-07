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
 * Class News
 *
 * @property int $id
 * @property string $title
 * @property string $icon
 * @property string $content
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Service $Services
 *
 * @package App\Models
 */
class Service extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $table = 'services';

    protected $casts = [
    ];

    protected $fillable = [

        'title',
        'url',
        'parent'

    ];


//    public function getIconAttribute()
//    {
//        return asset("/uploads/services/{$this->attributes['icon']}");
//    }
}
