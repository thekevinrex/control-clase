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
        Schema::create('profesors', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('password');
            $table->string('email')->unique();

            $table->unsignedBigInteger('departament_id')->nullable();

            $table->foreign('departament_id')
                ->references('id')
                ->on('departaments')
                ->onDelete('set null');

            $table->unsignedBigInteger('category_id')->nullable();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null');

            $table->boolean('super_admin')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};