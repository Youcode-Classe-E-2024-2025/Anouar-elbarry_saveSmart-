<?php

namespace Tests\Unit;

use App\Models\goals;
use App\Models\profiles;
use Tests\TestCase;
use App\Models\Income;
use App\Models\User; 
use Illuminate\Foundation\Testing\RefreshDatabase;

class goalsTest extends TestCase
{
    use RefreshDatabase;
    public function test_can_create_goals()
    {
       
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'), // Make sure to hash the password
        ]);
        
        $profile = profiles::create([
            'avatar' => 'c:\Users\safiy\Downloads\WhatsApp Image 2025-02-19 at 22.27.50.jpeg',
            'name' =>'anouar',
            'user_id' => $user->id
        ]);
        $data = [
            'user_id' => $user->id, 
            'profile_id' => $profile->id,
            'title' => 'car',
            'target_amount' => 2040.32,
            'saved_amount' => 122.3,
            'deadline' => '2025-12-23'
        ];
        goals::create($data);

        $this->assertDatabaseHas('goals', [
           'user_id' => $user->id, 
            'profile_id' => $profile->id,
            'title' => 'car',
            'target_amount' => 2040.32,
            'saved_amount' => 122.3,
            'deadline' => '2025-12-23'
        ]);
    }
    public function test_goals_amount()
    {
        
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
        $response = $this->post('/goals/create',[
            'user_id' => $user->id, 
            'profile_id' => $profile->id,
            'title' => 'car',
            'target_amount' => 1040.32,
            'saved_amount' => 322.3,
            'deadline' => '2025-12-23'
        ]);

        $response->assertSessionHas('error');
    }

    public function test_destroy_goal()
{
         
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
        $data = [
            'user_id' => $user->id, 
            'profile_id' => $profile->id,
            'title' => 'car',
            'target_amount' => 2040.32,
            'saved_amount' => 122.3,
            'deadline' => '2025-12-23'
        ];

        
     $goal =   goals::create($data);
    $goal->delete();

   
    $this->assertDatabaseMissing('goals', [
        'id' => $goal->id, 
    ]);
}
public function test_update_goals()
{
 
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
        $data = [
            'user_id' => $user->id, 
            'profile_id' => $profile->id,
            'title' => 'car',
            'target_amount' => 2040.32,
            'saved_amount' => 122.3,
            'deadline' => '2025-12-23'
        ];

        
       $goal = goals::create($data);
  
    $goal->update([
        'saved_amount' => 500.00
    ]);

   
    $this->assertDatabaseHas('goals', [
        'id' => $goal->id, 
       'saved_amount' => 500.00
    ]);
}
}
