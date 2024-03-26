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
        Schema::create('notifiactions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('to_user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('profesors')
                ->onDelete('Cascade');

            $table->foreign('to_user_id')
                ->references('id')
                ->on('profesors')
                ->onDelete('Cascade');

            $table->string('message')->nullable();
            $table->string('type');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifiactions');
    }
};
