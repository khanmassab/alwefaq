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
 * Class Qualification
 *
 * @property int $id
 * @property string $name
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|MarriageRequest[] $marriage_requests
 *
 * @package App\Models
 */
class Qualification extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'qualifications';

    protected $fillable = [
        'name'
    ];

    public function marriage_requests()
    {
        return $this->hasMany(MarriageRequest::class);
    }
}
