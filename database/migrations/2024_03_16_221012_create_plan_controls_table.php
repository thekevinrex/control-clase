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
        Schema::create('plan_controls', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('plan_id');

            $table->foreign('plan_id')
                ->references('id')
                ->on('plans')
                ->onDelete('Cascade');

            $table->unsignedBigInteger('controlador');
            $table->unsignedBigInteger('controlado');


            $table->integer('semana');

            $table->foreign('controlador')
                ->references('id')
                ->on('profesors')
                ->onDelete('Cascade');

            $table->foreign('controlado')
                ->references('id')
                ->on('profesors')
                ->onDelete('Cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_controls');
    }
};
