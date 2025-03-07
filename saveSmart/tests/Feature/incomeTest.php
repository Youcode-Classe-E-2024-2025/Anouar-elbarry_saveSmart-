<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\profiles;
use App\Models\Income;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IncomeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_income()
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

        $response = $this->post('/dashboard/add_income', [
            'user_id' => $user->id,
            'profile_id' => $profile->id,
            'source' => 'freelancing',
            'amount' => 2040.32,
            'date' => '2025-12-23'
        ]);

        $response->assertStatus(302); 
        $this->assertDatabaseHas('incomes', [
            'user_id' => $user->id,
            'profile_id' => $profile->id,
            'source' => 'freelancing',
            'amount' => 2040.32,
            'date' => '2025-12-23'
        ]);
    }

    /** @test */
    public function it_can_update_income()
    {
       
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'), 
        ]);

        $income = Income::create([
            'user_id' => $user->id,
            'source' => 'freelancing',
            'amount' => 2040.32,
            'date' => '2025-12-23'
        ]);

        $response = $this->put("/income/{$income->id}/update", [
            'source' => 'updated freelancing',
            'amount' => 2500.00,
            'date' => '2025-12-30'
        ]);

        $response->assertStatus(302); 
        $this->assertDatabaseHas('incomes', [
            'id' => $income->id,
            'source' => 'updated freelancing',
            'amount' => 2500.00,
            'date' => '2025-12-30'
        ]);
    }

    /** @test */
    public function it_can_delete_income()
    {
       
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'), 
        ]);

        $income = Income::create([
            'user_id' => $user->id,
            'source' => 'freelancing',
            'amount' => 2040.32,
            'date' => '2025-12-23'
        ]);

    
        $response = $this->delete("/income/{$income->id}/delete");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('incomes', [
            'id' => $income->id
        ]);
    }
}