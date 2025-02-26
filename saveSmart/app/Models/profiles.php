<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profiles extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'avatar'
    ];

    public function user(){
       return $this->belongsTo(User::class);
    }

 public function getAvatar()
    {
        return $this->avatar;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getId()
    {
        return $this->id;
    }
}
