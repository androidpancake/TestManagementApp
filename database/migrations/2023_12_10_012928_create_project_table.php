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
        Schema::create('project', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('jira_code')->nullable();
            $table->string('test_type')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->longText('desc')->nullable();
            $table->longText('scope')->nullable();
            $table->string('credentials')->nullable();
            $table->string('sat_process')->nullable();
            $table->string('retesting')->nullable();
            $table->string('tmp')->nullable();
            $table->string('updated_uat')->nullable();
            $table->string('uat_attendance')->nullable();
            $table->string('uat_result')->nullable();
            $table->string('other')->nullable();
            $table->string('env')->nullable();
            $table->string('is_generated')->nullable();
            $table->string('tmp_remark')->nullable();
            $table->string('updated_remark')->nullable();
            $table->string('uat_remark')->nullable();
            $table->string('uat_attendance_remark')->nullable();
            $table->string('other_remark')->nullable();
            $table->enum('published', ['published', 'draft']);
            $table->unsignedBigInteger('test_level_id');
            $table->foreignUuid('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project');
    }
};
