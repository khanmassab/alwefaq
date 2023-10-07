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
 * Class Ashom
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property string $total_stocks
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Ashom extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'ashom';

    protected $casts = [
        'price' => 'float'
    ];

    protected $fillable = [
        'name',
        'price',
        'total_stocks'
    ];
    
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
    
}
