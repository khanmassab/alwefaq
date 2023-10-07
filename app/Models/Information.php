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
 * Class Job
 *
 * @property string $title
 * @property string $content
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Information extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'information';

    protected $dates = [

    ];

    protected $fillable = [
        'title',
        'content'
    ];

}
