<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\VarDumper;

class expenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::with(['profile', 'category'])->where('user_id', Auth::id())->get();  
        $categories = Category::where('user_id',Auth::id())->get();
        return  view('back.expense',compact('categories'),compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
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
}
