<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/14/20, 5:44 PM
 * Last Modified: 9/14/20, 5:21 PM
 * Project Name: Wafaq
 * File Name: Admin.php
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Admin
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $name
 * @property string|null $remember_token
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Admin extends Authenticatable
{
    use HasFactory, HasRoles, Notifiable, SoftDeletes, LogsActivity;

    protected $table = 'admins';
    protected static $logName = 'admins';
    protected $guard = 'admin';
    protected $guard_name = 'admin';

    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static $logAttributes = ['name', 'email', 'status'];

    protected $dates = ['deleted_at', 'create_at', 'updated_at'];

    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            return $this->attributes['password'] = Hash::make($value);
        }
    }

    public function getRoleID()
    {
        return $this->roles[0]->id;
    }
}
