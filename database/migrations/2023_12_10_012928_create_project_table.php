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
            $table->string('name');
            $table->string('jira_code');
            $table->string('test_type');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('desc');
            $table->string('scope');
            $table->string('credentials');
            $table->string('sat_process');
            $table->string('retesting');
            $table->string('tmp');
            $table->string('updated_uat');
            $table->string('uat_attendance');
            $table->string('uat_result');
            $table->string('other');
            $table->string('env');
            $table->string('is_generated');
            $table->string('tmp_remark');
            $table->string('updated_remark');
            $table->string('uat_remark');
            $table->string('');
            $table->unsignedBigInteger('user_id');
            $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('cascade');
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
