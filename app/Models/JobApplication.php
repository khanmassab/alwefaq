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
 * Class JobApplication
 *
 * @property int $id
 * @property string $full_name
 * @property string $email
 * @property string $cv
 * @property int $job_id
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Job $job
 *
 * @package App\Models
 */
class JobApplication extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'job_applications';

    protected $casts = [
        'job_id' => 'int'
    ];

    protected $fillable = [
        'full_name',
        'email',
        'cv',
        'job_id'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function getCvAttribute()
    {
        return asset("/uploads/jobApplications/{$this->attributes['cv']}");
    }

}
