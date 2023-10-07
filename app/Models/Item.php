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
 * @property Collection|News[] $news
 *
 * @package App\Models
 */
class Item extends Model
{
 use HasFactory;

	use SoftDeletes;
	protected $table = 'items';

	protected $fillable = [
		'name',
        'image'
	];

//    public function help_request_item()
//    {
//        return $this->belongsTo(HelpRequestItem::class);
//    }
    public function getImageAttribute()
    {
        return asset("/uploads/items/{$this->attributes['image']}");
    }

}
