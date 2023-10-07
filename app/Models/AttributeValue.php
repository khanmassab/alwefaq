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
 * Class AttributeValue
 *
 * @property int $id
 * @property int $attribute_id
 * @property string $value
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Attribute $attribute
 *
 * @package App\Models
 */
class AttributeValue extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'attribute_values';

    protected $casts = [
        'attribute_id' => 'int'
    ];

    protected $fillable = [
        'attribute_id',
        'value'
    ];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
