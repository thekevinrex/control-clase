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
        Schema::table('notifiactions', function (Blueprint $table) {
            $table->boolean('seen')->default(false);
            $table->integer('aditional_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifiactions', function (Blueprint $table) {
            $table->dropColumn('seen');
            $table->dropColumn('aditional_id');
        });
    }
};
