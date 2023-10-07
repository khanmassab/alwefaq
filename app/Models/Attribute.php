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
 * Class Attribute
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $belongsTo_type
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|AttributeValue[] $attribute_values
 *
 * @package App\Models
 */
class Attribute extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'attributes';

    protected $fillable = [
        'name',
        'type',
        'belongsTo_type'
    ];

    public function attribute_values()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
