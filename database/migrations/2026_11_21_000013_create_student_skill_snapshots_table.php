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
        Schema::create('student_skill_snapshots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('student_profiles')->cascadeOnDelete();
            $table->string('academic_year', 10);
            $table->unsignedTinyInteger('semester');
            $table->json('skills_snapshot');
            $table->timestamp('recorded_at');
            $table->timestamps();

            $table->index(['student_id', 'academic_year', 'semester'], 'student_snapshot_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_skill_snapshots');
    }
};
