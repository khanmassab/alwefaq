<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected static $logName = 'order_items';


	protected $casts = [
        'price' => 'float'

	];

	protected $fillable = [
		'order_id',
		'item_id',
		'item_name',
		'type',
        'quantity',
        'price',
	];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}
	public function sadakat()
	{
		return $this->belongsTo(Sadakat::class, 'item_id');
	}
	public function ashom()
	{
		return $this->belongsTo(Ashom::class,'item_id');
	}

}
