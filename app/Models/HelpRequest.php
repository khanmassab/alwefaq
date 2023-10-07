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
 * Class HelpRequest
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $phoneNumber
 * @property string $email
 * @property string $address
 * @property string $type
 * @property string $status
 * @property float|null $value_request
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property User $user
 * @property Collection|HelpRequestItem[] $help_request_items
 *
 * @package App\Models
 */
class HelpRequest extends Model
{
 use HasFactory;

	use SoftDeletes;
	protected $table = 'help_requests';

	protected $casts = [
		'user_id' => 'int',
		'value_request' => 'float'
	];

	protected $fillable = [
		'user_id',
		'full_name',
		'phoneNumber',
		'email',
		'address',
		'type',
		'status',
		'value_request'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function help_request_items()
	{
		return $this->hasMany(HelpRequestItem::class);
	}
}

