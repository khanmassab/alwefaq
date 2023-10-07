<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUقs extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'contact_us';


    protected $fillable = [
        'subject',
        'email',
        // 'message',
        'name',
        'user_id',
        
    ];

    protected $casts = [
        'user_id' => 'int'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
