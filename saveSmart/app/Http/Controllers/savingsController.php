<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\savings;
use Illuminate\Support\Facades\Auth;
class savingsController extends Controller
{
    static function updateSavings(){
        $totalIncome = Income::where('user_id', Auth::id())->sum('amount') ?? 0;
       return   savings::where('user_id',Auth::id())->update(['amount' => $totalIncome*0.3,'updated_at' => now()]);
    } 
}
