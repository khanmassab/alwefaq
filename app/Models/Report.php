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
 * Class Report
 *
 * @property int $id
 * @property string $subject
 * @property string $email
 * @property string $message
 * @property string $name
 * @property int|null $user_id
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property User $user
 *
 * @package App\Models
 */
class Report extends Model
{
 use HasFactory;

	use SoftDeletes;
	protected $table = 'reports';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'subject',
		'email',
		'message',
		'phone',
		'name',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
