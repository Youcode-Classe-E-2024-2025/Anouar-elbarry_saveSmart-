<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;
protected $table = "category";
    protected $fillable = [
        'user_id',
        'name'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
