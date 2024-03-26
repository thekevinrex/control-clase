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
        Schema::create('informes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('profesors')
                ->onDelete('set null');

            $table->unsignedBigInteger('departament_id')->nullable();
            $table->string('departament_name')->nullable();

            $table->foreign('departament_id')
                ->references('id')
                ->on('departaments')
                ->onDelete('set null');

            // El periodo
            $table->unsignedBigInteger('periodo_id')->nullable();

            $table->foreign('periodo_id')
                ->references('id')
                ->on('periodos')
                ->onDelete('cascade');

            // profesor controlado
            $table->unsignedBigInteger('to_user_id')->nullable();

            $table->foreign('to_user_id')
                ->references('id')
                ->on('profesors')
                ->onDelete('set null');

            $table->unsignedBigInteger('asignature_id')->nullable();
            $table->string('asignature_name')->nullable();

            $table->foreign('asignature_id')
                ->references('id')
                ->on('asignatures')
                ->onDelete('set null');


            $table->string('titulo');
            $table->string('grupo');
            $table->string('tipo_clase');

            $table->text('logros')->nullable();
            $table->text('deficiencias')->nullable();
            $table->text('recomendaciones')->nullable();
            $table->integer('evaluation')->nullable();

            $table->integer('state')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informes');
    }
};
