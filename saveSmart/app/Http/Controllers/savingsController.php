<?php

namespace App\Http\Controllers;

use App\Models\totalbalance;
use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\savings;
use Illuminate\Support\Facades\Auth;
class savingsController extends Controller
{
    static function updateSavings(){
        $balance = totalbalance::where('user_id', Auth::id())->sum('amount') ?? 0;
       return   savings::where('user_id',Auth::id())->update(['amount' => $balance*0.2,'updated_at' => now()]);
    } 
}
