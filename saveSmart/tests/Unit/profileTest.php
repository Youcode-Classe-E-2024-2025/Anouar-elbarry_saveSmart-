<?php

namespace Tests\Unit;

use App\Models\profiles;
use Tests\TestCase;
use App\Models\User; 
use Illuminate\Foundation\Testing\RefreshDatabase;
class profileTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
 public function test_create_profile(){
    $user = User::create([
        'name' => 'Test User',
        'email' => 'test@gmail.com',
        'password' => bcrypt('password'), 
    ]);
    
    $profile = profiles::create([
        'avatar' => 'c:\Users\safiy\Downloads\WhatsApp Image 2025-02-19 at 22.27.50.jpeg',
        'name' =>'anouar',
        'user_id' => $user->id
    ]);

    $this->assertDatabaseHas('profiles',[
        'id' => $profile->id,
        'avatar' => 'c:\Users\safiy\Downloads\WhatsApp Image 2025-02-19 at 22.27.50.jpeg',
        'name' =>'anouar',
        'user_id' => $user->id
    ]);
 }
 public function test_destroy_profile(){
    $user = User::create([
        'name' => 'Test User',
        'email' => 'test@gmail.com',
        'password' => bcrypt('password'), 
    ]);
    
    $profile = profiles::create([
        'avatar' => 'c:\Users\safiy\Downloads\WhatsApp Image 2025-02-19 at 22.27.50.jpeg',
        'name' =>'anouar',
        'user_id' => $user->id
    ]);


    $profile->delete();

    $this->assertDatabaseMissing('profiles',[
        'id' => $profile->id
    ]);
 }
 public function test_update_profile(){
    $user = User::create([
        'name' => 'Test User',
        'email' => 'test@gmail.com',
        'password' => bcrypt('password'), 
    ]);
    
    $profile = profiles::create([
        'avatar' => 'c:\Users\safiy\Downloads\WhatsApp Image 2025-02-19 at 22.27.50.jpeg',
        'name' =>'anouar',
        'user_id' => $user->id
    ]);


    $profile->update([
        'avatar' => 'c:\Users\safiy\Downloads\WhatsApp Image 2025-02-27 at 11.59.46.jpeg',
        'name' => 'yassine'
    ]);

    $this->assertDatabaseHas('profiles',[
        'id' => $profile->id,
        'user_id' => $user->id,
        'avatar' => 'c:\Users\safiy\Downloads\WhatsApp Image 2025-02-27 at 11.59.46.jpeg',
        'name' => 'yassine'
    ]);
 }
}
