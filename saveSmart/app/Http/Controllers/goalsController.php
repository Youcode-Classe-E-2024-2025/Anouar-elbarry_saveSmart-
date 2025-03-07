<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\goals;
use App\Models\totalbalance;

class goalsController extends Controller
{

    public function index()
    {
        $wants = (totalbalance::where('user_id',Auth::id())->sum('amount'))*0.3;
        $totalUsed = goals::where('user_id',Auth::id())->sum('saved_amount');
        $available = $wants - $totalUsed;
        $goals = goals::where('user_id',Auth::id())->with('profile')->get();
        // var_dump($wants);
        return view('back.goals',['goals' => $goals,'totalUsed' => $totalUsed,'available' => $available]);
    }


    public function create(Request $request)
    {
        $wants = (totalbalance::where('user_id',Auth::id())->sum('amount'))*0.3;
        $totalUsed = goals::where('user_id',Auth::id())->sum('saved_amount');
        $available = $wants - $totalUsed;
        if($available == 0){
            return redirect()->back()->with('error','there is no mony to save');
        }
        elseif($request['saved_amount'] > $available){
            return redirect()->back()->with('error','the saved amount is passed the availabel amount');
        }
        $validated = $request->validate([
            'title' => ['string','required','unique:goals,title'],
            'target_amount' => ['required','numeric'],
            'saved_amount' => ['required','numeric'],
            'deadline' => ['required','date','after_or_equal:today']
        ]);

        $validated['user_id'] = Auth::id();
        $validated['profile_id'] = session('profile')->getId();
        $goal = goals::create($validated);
        balanceController::updateTotalBalance();
        return redirect()->route('goals')->with('success','Goal dded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $goal = goals::find($id);
        // return view('');
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
        $wants = (totalbalance::where('user_id',Auth::id())->sum('amount'))*0.3;
        $totalUsed = goals::where('user_id',Auth::id())->sum('saved_amount');
        $available = $wants - $totalUsed;
        if($available == 0){
            return redirect()->back()->with('error','there is no mony to save');
        }
        elseif($request['saved_amount'] > $available){
            return redirect()->back()->with('error','the saved amount is passed the availabel amount');
        }
       $validated = $request->validate([
            'saved_amount' => 'required'
        ]);
        $goal = goals::find($id);
        $goal->saved_amount = $validated['saved_amount'];
        $goal->save();
        balanceController::updateTotalBalance();
        return redirect()->back()->with('success', 'Saved amount updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $goal = goals::find($id);
        $goal->delete();
        balanceController::updateTotalBalance();
        return redirect()->back()->with('success','goal deleted successfully');
    }
}
