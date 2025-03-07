<?php

namespace Tests\Unit;

use App\Models\profiles;
use Tests\TestCase;
use App\Models\Income;
use App\Models\User; 
use Illuminate\Foundation\Testing\RefreshDatabase;

class IncomeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_income()
    {
        // Create a user to satisfy the foreign key constraint
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
            'user_id' => $user->id, // Use the created user's ID
            'profile_id' => $profile->id,
            'source' => 'freelancing',
            'amount' => 2040.32,
            'date' => '2025-12-23'
        ];

        // Create the income record
        Income::create($data);

        // Assert that the income was created
        $this->assertDatabaseHas('incomes', [
            'amount' => 2040.32,
            'source' => 'freelancing',
            'date' => '2025-12-23',
            'user_id' => $user->id, // Verify the user_id
        ]);
    }

    public function test_destroy_income()
{
    // Create a user to satisfy the foreign key constraint
    $user = User::create([
        'name' => 'Test User',
        'email' => 'test@gmail.com',
        'password' => bcrypt('password'), // Make sure to hash the password
    ]);

    // Create a profile to satisfy the foreign key constraint
    $profile = profiles::create([
        'avatar' => 'c:\Users\safiy\Downloads\WhatsApp Image 2025-02-19 at 22.27.50.jpeg',
        'name' => 'anouar',
        'user_id' => $user->id
    ]);

    // Create an income record
    $income = Income::create([
        'user_id' => $user->id,
        'profile_id' => $profile->id,
        'source' => 'freelancing',
        'amount' => 2040.32,
        'date' => '2025-12-23'
    ]);

    // Delete the income record
    $income->delete();

    // Assert that the income was deleted
    $this->assertDatabaseMissing('incomes', [
        'id' => $income->id, // Verify that this specific income ID is missing
    ]);
}
public function test_update_income()
{
    // Create a user to satisfy the foreign key constraint
    $user = User::create([
        'name' => 'Test User',
        'email' => 'test@gmail.com',
        'password' => bcrypt('password'), // Make sure to hash the password
    ]);

    // Create a profile to satisfy the foreign key constraint
    $profile = profiles::create([
        'avatar' => 'c:\Users\safiy\Downloads\WhatsApp Image 2025-02-19 at 22.27.50.jpeg',
        'name' => 'anouar',
        'user_id' => $user->id
    ]);

    // Create an income record
    $income = Income::create([
        'user_id' => $user->id,
        'profile_id' => $profile->id,
        'source' => 'freelancing',
        'amount' => 2040.32,
        'date' => '2025-12-23'
    ]);

    // Update the income record
    $income->update([
        'amount' => 2500.00, // New amount
        'source' => 'updated freelancing', // Updated source
    ]);

    // Assert that the income was updated
    $this->assertDatabaseHas('incomes', [
        'id' => $income->id, // Verify the specific income ID
        'amount' => 2500.00, // Verify the updated amount
        'source' => 'updated freelancing', // Verify the updated source
    ]);
}
}