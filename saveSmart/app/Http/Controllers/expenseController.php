<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Category;
use App\Models\totalbalance;
use App\Models\goals;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\VarDumper;
use Barryvdh\DomPDF\Facade\Pdf;


class expenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $needs = (totalbalance::where('user_id',Auth::id())->sum('amount'))*0.5;
        $totalUsed = Expense::where('user_id',Auth::id())->sum('amount');
        $available = $needs - $totalUsed;
        $expenses = Expense::with(['profile', 'category'])->where('user_id', Auth::id())->get();  
        $categories = Category::where('user_id',Auth::id())->get();
        return  view('back.expense',compact('categories'),compact('expenses','totalUsed','available'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $needs = (totalbalance::where('user_id',Auth::id())->sum('amount'))*0.5;
        $totalUsed = Expense::where('user_id',Auth::id())->sum('amount');
        $available = $needs - $totalUsed;
        if($available == 0){
            return redirect()->back()->with('error','there is no mony to save');
        }
        elseif($request['amount'] > $available){
            return redirect()->back()->with('error','the saved amount is passed the availabel amount');
        }
        $request->validate([
            'category_id' => 'required', 
            'amount' => 'required|numeric',
            'date' => 'required|date', 
        ]);

        $expense = Expense::create([
            'user_id' => Auth::id(), 
            'profile_id' => session('profile')->getId(),
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'date' => $request->date,
        ]);
        
        if($expense){
            balanceController::updateTotalBalance();
            return redirect()->back()->with('success', 'expense record created successfully.');
        }else{
            return redirect()->back()->with('error', 'expense record has not created.');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $expense = Expense::with('category')->findOrFail($id);
        return response()->json($expense);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $needs = (totalbalance::where('user_id',Auth::id())->sum('amount'))*0.5;
        $totalUsed = Expense::where('user_id',Auth::id())->sum('amount');
        $available = $needs - $totalUsed;
        if($available == 0){
            return redirect()->back()->with('error','there is no mony to save');
        }
        elseif($request['amount'] > $available){
            return redirect()->back()->with('error','the saved amount is passed the availabel amount');
        }
        $expense = Expense::findOrFail($id);
        $validated = $request->validate([
                 'category_id' => 'required', 
                 'amount' => 'required|numeric',
                 'date' => 'required|date|before_or_equal:today', 
        ]);
        $expense->update($validated);
        balanceController::updateTotalBalance();
        return redirect()->back()->with('success','expense updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();
        balanceController::updateTotalBalance();
        return redirect()->back()->with('success','expense deleted successfully');
    }

    public function generateGeneralReport()
    {
        $userId = Auth::id();
    
        // Calculate total expenses
        $totalExpenses = Expense::where('user_id', $userId)->sum('amount');
    
        // Calculate total savings
        $totalSavings = goals::where('user_id', $userId)->sum('saved_amount');
    
        // Calculate available amount
        $needs = (totalbalance::where('user_id', $userId)->sum('amount')) * 0.5;
        $totalUsed = Expense::where('user_id', $userId)->sum('amount');
        $available = $needs - $totalUsed;
    
        // Calculate total goals
        $totalGoals = goals::where('user_id', $userId)->count();
    
        // Calculate total income (if applicable)
        $totalIncome = totalbalance::where('user_id', $userId)->sum('amount');
    
        // Prepare report data
        $reportData = [
            'total_expenses' => $totalExpenses,
            'total_savings' => $totalSavings,
            'available_amount' => $available,
            'total_goals' => $totalGoals,
            'total_income' => $totalIncome,
        ];
    
        // Generate PDF
        $pdf = PDF::loadView('back.reports.report', compact('reportData'));
    
        // Return the PDF as a download
        return $pdf->download('general_report.pdf');
    }
}
