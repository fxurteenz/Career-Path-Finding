<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Seeder หลักของระบบ เรียกใช้งาน Seeders ทั้งหมดตามลำดับความสัมพันธ์
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleAndSkillSeeder::class,
            CourseSeeder::class,
            UserSeeder::class,
        ]);
    }
}
