<?php

namespace App\Http\Controllers;

use App\Models\profiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = profiles::all();
        return view('front.profile-select',compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
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
    }
    /**
     * Store a newly created resource in storage.
     */
    public function select($profile_id)
    {
        $selectedProfile = Profiles::find($profile_id);
        $profiles = profiles::all();
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
