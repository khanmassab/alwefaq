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
 * Class VolunteerApplication
 *
 * @property int $id
 * @property string $full_name
 * @property string $email
 * @property string $cv
 * @property int $volunteer_id
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Volunteer $volunteer
 *
 * @package App\Models
 */
class VolunteerApplication extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'volunteer_applications';

    protected $casts = [
        'volunteer_id' => 'int'
    ];

    protected $fillable = [
        'full_name',
        'email',
        'cv',
        'volunteer_id'
    ];

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class);
    }

    public function getCvAttribute()
    {
        return asset("/uploads/volunteerApplications/{$this->attributes['cv']}");
    }

}
