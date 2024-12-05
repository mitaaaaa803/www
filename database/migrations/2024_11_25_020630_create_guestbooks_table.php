<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * up : 創建
     */
    public function up(): void
    {
        Schema::create('guestbooks', function (Blueprint $table) {
            
            $table->unsignedBigInteger('users_id');//外建
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); //外建的約束
            $table->string('users_name'); 
            $table->string('mem_email')->nullable();
            $table->text('message');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     * down : 刪除
     */
    public function down(): void
    {
        Schema::dropIfExists('guestbooks');
    }
};
