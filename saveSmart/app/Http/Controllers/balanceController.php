<?php

namespace App\Http\Controllers;

use App\Models\savings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Expense;
use App\Models\Income;
use App\Models\goals;
use App\Models\totalbalance;

class balanceController extends Controller
{
    
    static function updateTotalBalance()
    {
        $userId = Auth::id();
    
        $totalIncome = Income::where('user_id', $userId)->sum('amount') ?? 0;
        $totalExpenses = Expense::where('user_id', $userId)->sum('amount') ?? 0;
        $goals = goals::where('user_id', $userId)->sum('saved_amount') ?? 0;
        $totalSavings = savings::where('user_id', $userId)->sum('amount') ?? 0;
    
        $newBalance = $totalIncome - ($totalExpenses + $totalSavings + $goals);
        
        return totalbalance::where('user_id', $userId)->update(['amount' => $newBalance, 'updated_at' => now()]);
    }

}
