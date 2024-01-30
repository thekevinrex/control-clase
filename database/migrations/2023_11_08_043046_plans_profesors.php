<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("plans_profesors", function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("plan_id");

            $table->foreign('plan_id')
                ->references('id')
                ->on('plans')
                ->onDelete('cascade');

            $table->unsignedBigInteger("user_id");

            $table->foreign('user_id')
                ->references('id')
                ->on('profesors')
                ->onDelete('cascade');

            $table->integer('semana');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans_profesors');
    }
};