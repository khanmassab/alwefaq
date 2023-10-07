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
 * Class Volunteer
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property string $condition
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|VolunteerApplication[] $volunteer_applications
 *
 * @package App\Models
 */
class Volunteer extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'volunteers';

    protected $dates = [
        'start_date',
        'end_date'
    ];

    protected $fillable = [
        'name',
        'code',
        'start_date',
        'end_date',
        'condition'
    ];

    public function volunteer_applications()
    {
        return $this->hasMany(VolunteerApplication::class, 'volunteer_id');
    }

    public function getcoutapllicationsAttribute() {
        return VolunteerApplication::where('volunteer_id', $this->attributes['id'])->count();
    }
}
