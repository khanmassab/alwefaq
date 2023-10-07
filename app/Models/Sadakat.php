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
 * Class Sadakat
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Sadakat extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'sadakat';

    protected $fillable = [
        'name',
        'price'
    ];
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

}
