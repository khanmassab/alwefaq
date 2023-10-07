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
 * Class Zakah
 * 
 * @property int $id
 * @property string $name
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Zakah extends Model
{
 use HasFactory;

	use SoftDeletes;
	protected $table = 'zakah';

	protected $fillable = [
		'name'
	];
}
