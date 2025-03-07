<?php

namespace Tests\Unit;

use App\Models\profiles;
use Tests\TestCase;
use App\Models\Income;
use App\Models\User; 
use Illuminate\Foundation\Testing\RefreshDatabase;
class userTest extends TestCase
{ 
    use RefreshDatabase;
 public function test_create_user(){
    $user = User::create([
        'name' => 'Test User',
        'email' => 'test@gmail.com',
        'password' => bcrypt('password')
    ]);

    $this->assertDatabaseHas('users',[
        'id' => $user->id,
        'name' => 'Test User',
        'email' => 'test@gmail.com'
    ]);
 }
 public function test_destroy_user(){
    $user = User::create([
        'name' => 'Test User',
        'email' => 'test@gmail.com',
        'password' => bcrypt('password')
    ]);

    $user->delete();

    $this->assertDatabaseMissing('users',[
        'id' => $user->id
    ]);
 }

 
}
