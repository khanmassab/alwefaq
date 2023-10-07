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
class Footer extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'footers';

    protected $fillable = ['title','url'];


}
