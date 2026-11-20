<?php

declare(strict_types=1);

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
        Schema::create('role_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('job_roles')->cascadeOnDelete();
            $table->foreignId('skill_id')->constrained('skills')->cascadeOnDelete();
            $table->unsignedTinyInteger('required_level'); // 1 to 4
            $table->unsignedTinyInteger('importance');     // 1 to 5
            $table->enum('type', ['must_have', 'nice_to_have'])->default('must_have');
            $table->timestamps();

            $table->unique(['role_id', 'skill_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_skills');
    }
};
