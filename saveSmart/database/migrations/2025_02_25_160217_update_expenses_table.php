<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('expenses',function(Blueprint $table){
            $table->unsignedBigInteger('user_id'); // Main user
            $table->unsignedBigInteger('profile_id'); // Profile that added the expense
            $table->unsignedBigInteger('category_id')->nullable(); // Links to category, nullable if category is deleted
            $table->decimal('amount', 10, 2); // Expense amount
            $table->date('date'); // Date of the expense

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->dropColumn('user_id'); // Main user
            $table->dropColumn('profile_id'); // Profile that added the expense
            $table->dropColumn('category_id')->nullable(); // Links to category, nullable if category is deleted
            $table->dropColumn('amount', 10, 2); // Expense amount
            $table->dropColumn('date'); 
        });
    }
};
