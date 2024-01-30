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
        Schema::create('departaments_asignatures', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('departament_id');

            $table->foreign('departament_id')
                ->references('id')
                ->on('departaments')
                ->onDelete('cascade');

            $table->unsignedBigInteger('asignature_id');

            $table->foreign('asignature_id')
                ->references('id')
                ->on('asignatures')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
