<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Expense extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'profile_id',
        'category_id',
        'amount',
        'date',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profiles::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getFormattedDateAttribute()
{
    return  \Carbon\Carbon::parse($this->date)->diffForHumans(); // Example: "2 days ago"
}
}
