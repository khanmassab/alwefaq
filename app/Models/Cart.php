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
class Cart extends Model
{
 use HasFactory;

	use SoftDeletes;
	protected $table = 'cart';

	protected $casts = [
		'user_id' => 'int',
        'price' => 'float'

	];

	protected $fillable = [
		'user_id',
		'item_id',
		'type',
        'quantity',
        'price',
        'status',
        

	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function sadakat()
	{
		return $this->belongsTo(Sadakat::class, 'item_id');
	}
	public function ashom()
	{
		return $this->belongsTo(Ashom::class,'item_id');
	}

}

