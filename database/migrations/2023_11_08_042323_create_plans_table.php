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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('profesors')
                ->onDelete('cascade');

            $table->unsignedBigInteger('departament_id');

            $table->foreign('departament_id')
                ->references('id')
                ->on('departaments')
                ->onDelete('cascade');

            $table->unsignedBigInteger('periodo_id')->nullable();

            $table->foreign('periodo_id')
                ->references('id')
                ->on('periodos')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
