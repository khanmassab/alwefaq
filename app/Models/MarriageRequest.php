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
 * Class MarriageRequest
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $middle_name
 * @property string|null $last_name
 * @property int|null $user_id
 * @property int|null $nationality_id
 * @property int|null $qualification_id
 * @property int|null $city_id
 * @property string|null $province
 * @property string|null $birthday_type
 * @property Carbon|null $birthday
 * @property string|null $job_title
 * @property string|null $job_in
 * @property string|null $job_type
 * @property string|null $note
 * @property string $request_type
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property City $city
 * @property Nationality $nationality
 * @property Qualification $qualification
 * @property User $user
 *
 * @package App\Models
 */
class MarriageRequest extends Model
{
 use HasFactory;

	use SoftDeletes;
	protected $table = 'marriage_requests';

	protected $casts = [
		'user_id' => 'int',
		'nationality_id' => 'int',
		'qualification_id' => 'int',
		'city_id' => 'int'
	];

	protected $dates = [
		'birthday'
	];

	protected $fillable = [
		'first_name',
		'middle_name',
		'last_name',
		'user_id',
		'nationality_id',
		'qualification_id',
		'city_id',
		'province',
		'birthday_type',
		'birthday',
		'age',
		'job_title',
		'job_in',
		'job_type',
		'tripe',
		'shape',
		'hair',
		'beared',
		'smoked',
		'hand_cover',
		'face_cover',
		'body_cover',
		'head_cover',
		'religion',
		'weight',
		'monthly_income',
		'height',
		'skin_color',
		'health_status',
		'disease',
		'social_status',
		'financial_status',
		'note',
		'options',
		'status',
		'unique_id',
		'request_type'
	];

	public function city()
	{
		return $this->belongsTo(City::class);
	}

	public function nationality()
	{
		return $this->belongsTo(Nationality::class);
	}

	public function qualification()
	{
		return $this->belongsTo(Qualification::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
