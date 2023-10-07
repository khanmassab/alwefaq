<?php

/**
 * Created by SmartCoder Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property int $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $phoneNumber
 * @property string $email
 * @property string $password
 * @property string $gender
 * @property Carbon $birthday
 * @property int $verification_code
 * @property bool $is_verify
 * @property string|null $remember_token
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|ContactU[] $contact_us
 * @property Collection|HelpRequest[] $help_requests
 * @property Collection|MarriageRequest[] $marriage_requests
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasFactory;

	use SoftDeletes;
    protected $table = 'users';
    protected static $logName = 'users';


	protected $casts = [
		'verification_code' => 'int',
		'is_verify' => 'bool'
	];

	protected $dates = [
		'birthday'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'first_name',
		'middle_name',
		'last_name',
		'phoneNumber',
		'email',
		'password',
		'gender',
		'birthday',
		'verification_code',
		'is_verify',
		'token',
		'status',
		'remember_token'
	];

    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            return $this->attributes['password'] = Hash::make($value);
        }
    }


	public function contact_us()
	{
		return $this->hasMany(ContactU::class);
	}

	public function help_requests()
	{
		return $this->hasMany(HelpRequest::class);
	}
	public function cart()
	{
		return $this->hasMany(Cart::class);
	}

	public function marriage_requests()
	{
		return $this->hasMany(MarriageRequest::class);
	}
}
