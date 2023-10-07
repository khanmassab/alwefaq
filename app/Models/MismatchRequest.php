<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MismatchRequest
 *
 * @property int $id
 * @property int|null $user_id
 * @property int $mismatch_request_id
 * @property int $request_id
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
// * @property MarriageRequest $mismatch_request_id
// * @property MarriageRequest $request_id
 * @property User $user
 *
 * @package App\Models
 */


class MismatchRequest extends Model
{
    use HasFactory;
	use SoftDeletes;
	protected $table = 'mismatch_requests';

	protected $casts = [
		'user_id' => 'int',
		'mismatch_request_id' => 'int',
		'request_id' => 'int',
	];
	protected $fillable = [
        'user_id',
        'mismatch_request_id',
        'request_id',
        'status',
    ];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function MarriageRequest()
	{
		return $this->belongsTo(MarriageRequest::class);
	}


}
