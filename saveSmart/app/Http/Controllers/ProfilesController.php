<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\profiles;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = profiles::where('user_id',Auth::id())->get();
        return view('front.profile-select',compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try{
        $request->validate([
            'name' => 'string|max:255|unique:profiles,name',
            'avatar' => 'string|unique:profiles,avatar'
        ]);

        $profile = Profiles::create([
           'name' => $request->name,
           'avatar' => $request->avatar,
           'user_id' => auth()->id()
        ]);

        \Log::info($profile);
   
      
      return  redirect()->route('profile-Selection');
    }catch(Exception $e){
      return redirect()->back()->with('error',$e->getMessage());
    }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function select($profile_id)
    {
        $selectedProfile = Profiles::find($profile_id);
        $profiles = profiles::where('user_id',Auth::id())->get();
        \Log::info($profiles);
        session(['profile' => $selectedProfile,
                       'profiles' => $profiles]);
        return redirect('/dashboard');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profile = profiles::findOrFail($id);

        $expenses = Expense::where('profile_id',$profile->id)
                    ->with('category')
                    ->orderBy('created_at')
                    ->get();
        $totalExpenses = $expenses->sum('amount');
        $expensesByCategory = $expenses->groupBy(function($expense){
                    return $expense->category ? $expense->category->name :'Uncategoriszd';
        })->map(function($categoryExpenses){
            return [
                'total'=> $categoryExpenses->sum('amount'),
                'count'=> $categoryExpenses->count()
            ];
        });
        return view('back.profile-details', compact('profile', 'expenses', 'totalExpenses', 'expensesByCategory'));
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
        $profile = profiles::findOrFail($id);
        $profile->delete();
    }
}
