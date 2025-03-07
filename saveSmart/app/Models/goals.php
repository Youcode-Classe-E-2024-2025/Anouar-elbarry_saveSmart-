<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class goals extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'target_amount',
        'saved_amount',
        'status',
        'deadline',
        'user_id',
        'profile_id'
    ];
    protected $table = "goals";

    function profile(){
        return $this->belongsTo(profiles::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }

    public function getProgressAttribute()
    {
        if ($this->target_amount == 0) {
            return 0;
        }
        return round(($this->saved_amount / $this->target_amount) * 100, 2);
    }
    public function getFormattedDeadlineAttribute()
    {
        $deadline = \Carbon\Carbon::parse($this->deadline);
        $now = \Carbon\Carbon::now();
    
        // Calculate the difference in days
        $difference = $now->diffInDays($deadline);
        
        // Return the formatted string
        return $difference . ' days left';
    }
}
