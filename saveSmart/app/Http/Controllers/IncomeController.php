<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use Illuminate\Support\Facades\Auth;
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
