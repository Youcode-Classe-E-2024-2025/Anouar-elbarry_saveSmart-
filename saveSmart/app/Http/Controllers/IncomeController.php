<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\goals;
use App\Models\savings;
use Illuminate\Http\Request;
use App\Models\Income;
use Illuminate\Support\Facades\Auth;
use App\Models\totalbalance;
class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomes = Income::where('user_id', Auth::id())->get(); 
        \Log::info($incomes);
        return view('back.income',compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'source' => 'required|string', 
            'amount' => 'required|numeric',
            'date' => 'required|date', 
        ]);

        $income = Income::create([
            'user_id' => Auth::id(), 
            'profile_id' => session('profile')->getId(),
            'source' => $request->source,
            'amount' => $request->amount,
            'date' => $request->date,
        ]);

        savingsController::updateSavings();
        balanceController::updateTotalBalance();

        if($income){
            return redirect()->back()->with('success', 'Income record created successfully.');
        }else{
            return redirect()->back()->with('error', 'Income record has not created.');
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
        $income = income::find($id);
        return response()->json($income);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $income = Income::findOrFail($id);
        $validated = $request->validate([
        'source' => 'required|string',
        'amount' => 'required|numeric|min:0',
        'date' => 'required|date|before_or_equal:today'
        ]);
        try {
            // dd($income);
            $income->update($validated);
            balanceController::updateTotalBalance();

            // dd($income->update($validated));
            return redirect()->route('income.home')->with('success', 'Income updated successfully');
        } catch (\Exception $e) {
            \Log::error($e);
            return back()->withInput()->with('error', 'Error updating income');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $income = Income::findOrFail($id);
        $income->delete();
        balanceController::updateTotalBalance();
        return redirect()->back()->with('success','Income deleted successfully!');
    }
}
