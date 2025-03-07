<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Expense;
use App\Models\profiles;
use Tests\TestCase;
use App\Models\Income;
use App\Models\User; 
use Illuminate\Foundation\Testing\RefreshDatabase;

class expenseTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_expense()
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

        $category = Category::create([
            'name' => 'food',
            'user_id' => $user->id
        ]);
        $data = [
            'user_id' => $user->id, // Use the created user's ID
            'profile_id' => $profile->id,
            'category_id' => $category->id,
            'amount' => 2040.32,
            'date' => '2024-12-23'
        ];

        // Create the income record
        Expense::create($data);

        // Assert that the income was created
        $this->assertDatabaseHas('expenses', [
            'user_id' => $user->id, // Use the created user's ID
            'profile_id' => $profile->id,
            'category_id' => $category->id,
            'amount' => 2040.32,
            'date' => '2024-12-23'
        ]);
    }

    public function test_destroy_expense()
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
    $category = Category::create([
        'name' => 'food',
        'user_id' => $user->id
    ]);
    $data = [
        'user_id' => $user->id, // Use the created user's ID
        'profile_id' => $profile->id,
        'category_id' => $category->id,
        'amount' => 2040.32,
        'date' => '2024-12-23'
    ];

    // Create the income record
    $expense =  Expense::create($data);
    // Delete the income record
    $expense->delete();

    // Assert that the income was deleted
    $this->assertDatabaseMissing('expenses', [
        'id' => $expense->id, // Verify that this specific income ID is missing
    ]);
}
public function test_update_expense()
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
    $category = Category::create([
        'name' => 'food',
        'user_id' => $user->id
    ]);
    $data = [
        'user_id' => $user->id, // Use the created user's ID
        'profile_id' => $profile->id,
        'category_id' => $category->id,
        'amount' => 2040.32,
        'date' => '2024-12-23'
    ];

    // Create the income record
    $expense = Expense::create($data);
    $category2 = Category::create([
        'name' => 'gym',
        'user_id' => $user->id
    ]);
    // Update the income record
    $expense->update([
        'category_id' => $category2->id,
        'amount' => 4000
    ]);

    // Assert that the income was updated
    $this->assertDatabaseHas('expenses', [
        'id' => $expense->id, // Verify the specific income ID // Verify the updated amount
        'category_id' => $category2->id,
        'amount' => 4000
    ]);
}
}
