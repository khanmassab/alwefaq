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
 * Class Administrative
 *
 * @property int $id
 * @property string $name
 * @property string $positions
 * @property int $order
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Administrative extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'administratives';
    protected $casts = [
        'order' => 'int'
    ];

    protected $fillable = [
        'name',
        'positions',
        'order',
        'image'
    ];

    public function getImageAttribute()
    {
        return asset("uploads/administratives/{$this->attributes['image']}");
    }
}

