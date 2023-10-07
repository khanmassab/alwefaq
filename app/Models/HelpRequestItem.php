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
 * Class HelpRequestItem
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property int $help_request_id
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property HelpRequest $help_request
 *
 * @package App\Models
 */
class HelpRequestItem extends Model
{
 use HasFactory;

	use SoftDeletes;
	protected $table = 'help_request_items';

	protected $casts = [
		'help_request_id' => 'int',
        'item_id' => 'int'
	];

	protected $fillable = [
		'help_request_id',
        'item_id',
        'name'
	];

	public function help_request()
	{
		return $this->belongsTo(HelpRequest::class);
	}

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
