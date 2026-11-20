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
        Schema::create('shortlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('employer_profiles')->cascadeOnDelete();
            $table->foreignId('student_id')->constrained('student_profiles')->cascadeOnDelete();
            $table->foreignId('target_role_id')->nullable()->constrained('job_roles')->nullOnDelete();
            $table->text('note')->nullable();
            $table->timestamps();

            $table->unique(['employer_id', 'student_id', 'target_role_id'], 'employer_student_role_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shortlists');
    }
};
