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
        Schema::create('test_steps', function (Blueprint $table) {
            $table->id();
            $table->string('test_step_id');
            $table->string('test_step');
            $table->string('expected_result');
            $table->string('category');
            $table->string('severity');
            $table->string('status');
            $table->unsignedBigInteger('case_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_steps');
    }
};
