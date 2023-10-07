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
 * Class Setting
 *
 * @property int $id
 * @property string $group
 * @property string $name
 * @property string $key
 * @property string $type
 * @property string $value
 * @property string|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Setting extends Model
{
    protected $table = 'settings';
    protected static $logName = 'settings';

    protected $fillable = ['group','name','key','type','value','image1','image2'];
    protected static $logAttributes = ['group','name','key','type','value'];
    
    public function getImageAttribute()
    {
        return asset("uploads/setting/{$this->attributes['image1']}");
    }
    public function getImageAttribute2()
    {
        return asset("uploads/setting/{$this->attributes['image2']}");
    }

}
