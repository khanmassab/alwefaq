<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transfer extends Model
{
    use HasFactory;
    protected $table = 'transfers';
    protected static $logName = 'transfers';


	protected $fillable = [
		'transfer_image',
		'order_id',
	];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}
    public function getImageAttribute()
    {
        return asset("/uploads/transfers/{$this->attributes['transfer_image']}");
    }

}
