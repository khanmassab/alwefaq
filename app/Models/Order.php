<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
	protected $table = 'orders';

	protected $casts = [
		'user_id' => 'int',
		'total' => 'float',
	];
    
	protected $fillable = [
		'payment_method',
		'total',
		'user_id',
		'status',
	];
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function order_items()
	{
		return $this->hasMany(OrderItem::class);
	}
	public function transfer()
	{
		return $this->hasOne(Transfer::class);
	}
    
}
