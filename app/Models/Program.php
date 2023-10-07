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
 * @property string $url
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Program $program
 *
 * @package App\Models
 */
class Program extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $table = 'programs';

    protected $casts = [
    ];

    protected $fillable = [

        'title',
        'url',
        'parent'

    ];
}
