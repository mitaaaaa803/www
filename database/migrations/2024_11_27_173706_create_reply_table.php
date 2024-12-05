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
        Schema::create('reply', function (Blueprint $table) { 
            $table->id('users_id'); 
            $table->unsignedBigInteger('guest_id');
            $table->string('users_name');
            $table->string('users_email');
            $table->text('content');
            $table->timestamps();

            $table->foreign('guest_id')
                ->references('users_id')
                ->on('guests')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reply');
    }
};
