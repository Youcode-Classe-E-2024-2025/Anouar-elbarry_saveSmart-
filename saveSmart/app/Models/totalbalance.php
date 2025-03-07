<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class totalbalance extends Model
{
    use HasFactory;

    protected $table = 'totalbalance';
    protected $fillable = [
        'amount',
        'user_id'
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }
}
