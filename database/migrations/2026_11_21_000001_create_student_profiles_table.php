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
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained('users')->cascadeOnDelete();
            $table->string('student_code', 20)->nullable()->index();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('program_name', 150)->nullable();
            $table->unsignedTinyInteger('year_level')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('linkedin_url', 255)->nullable();
            $table->boolean('opt_in_employer')->default(false)->index();
            $table->json('visibility_settings')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_profiles');
    }
};
