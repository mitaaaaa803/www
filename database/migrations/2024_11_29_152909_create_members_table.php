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
        Schema::create('members', function (Blueprint $table) {
            $table->id('users_id'); 
            $table->string('name',50);
            $table->string('email',100)->unique(); // unique 是唯一索引，如果再輸入一樣的email，會報錯
            $table->string('username',20);
            $table->string('password');
            $table->enum('gender', ['male', 'female', 'other'])->default('other'); 
            $table->string('profile_picture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
