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
 * Class NewsCategory
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|Partners[] $partners
 *
 * @package App\Models
 */
class Partner extends Model
{
 use HasFactory;

	use SoftDeletes;
	protected $table = 'partners';

	protected $fillable = [
		'name',
        'image'
	];

    public function getImageAttribute()
    {
        return asset("uploads/partners/{$this->attributes['image']}");
    }

}
