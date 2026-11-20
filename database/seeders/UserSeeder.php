<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\EmployerProfile;
use App\Models\StudentProfile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Seeder สำหรับบัญชีผู้ใช้ทดสอบในแต่ละบทบาทของระบบ
 */
class UserSeeder extends Seeder
{
    public function run(): void
    {
        $defaultPassword = Hash::make('password123');

        // 1. ผู้ดูแลระบบ (Admin)
        User::updateOrCreate(
            ['email' => 'admin@careerpath.local'],
            [
                'name' => 'ผู้ดูแลระบบ',
                'password' => $defaultPassword,
                'role' => 'admin',
                'status' => 'active',
                'email_verified_at' => now(),
            ]
        );

        // 2. หัวหน้าสาขาวิชา (Department Head)
        User::updateOrCreate(
            ['email' => 'head.it@mail.kmutt.ac.th'],
            [
                'name' => 'ผศ.ดร. บุญชู นำทาง (หน.สาขา)',
                'password' => $defaultPassword,
                'role' => 'dept_head',
                'status' => 'active',
                'email_verified_at' => now(),
            ]
        );

        // 3. อาจารย์ประจำวิชา / ที่ปรึกษา (Faculty)
        User::updateOrCreate(
            ['email' => 'faculty.sompong@mail.kmutt.ac.th'],
            [
                'name' => 'อ. สมพงษ์ สอนดี',
                'password' => $defaultPassword,
                'role' => 'faculty',
                'status' => 'active',
                'email_verified_at' => now(),
            ]
        );

        // 4. นักศึกษาในระบบ (Student)
        $studentUser = User::updateOrCreate(
            ['email' => 'somchai.s@mail.kmutt.ac.th'],
            [
                'name' => 'สมชาย สายชล',
                'password' => $defaultPassword,
                'role' => 'student',
                'status' => 'active',
                'email_verified_at' => now(),
            ]
        );

        StudentProfile::updateOrCreate(
            ['user_id' => $studentUser->id],
            [
                'student_code' => '66070001',
                'first_name' => 'สมชาย',
                'last_name' => 'สายชล',
                'program_name' => 'เทคโนโลยีสารสนเทศ',
                'year_level' => 3,
                'phone' => '0812345678',
                'linkedin_url' => 'https://linkedin.com/in/somchai',
                'opt_in_employer' => true,
                'visibility_settings' => [
                    'show_phone' => false,
                    'show_grades' => false,
                    'hidden_projects' => [],
                ],
            ]
        );

        // 5. บุคคลภายนอก (External Learner)
        $externalUser = User::updateOrCreate(
            ['email' => 'external.wichai@gmail.com'],
            [
                'name' => 'วิชัย มั่นคง',
                'password' => $defaultPassword,
                'role' => 'external',
                'status' => 'active',
                'email_verified_at' => now(),
            ]
        );

        StudentProfile::updateOrCreate(
            ['user_id' => $externalUser->id],
            [
                'student_code' => null,
                'first_name' => 'วิชัย',
                'last_name' => 'มั่นคง',
                'program_name' => 'บุคคลภายนอก',
                'year_level' => null,
                'phone' => '0898765432',
                'linkedin_url' => 'https://linkedin.com/in/wichai-external',
                'opt_in_employer' => true,
                'visibility_settings' => [
                    'show_phone' => true,
                    'show_grades' => false,
                    'hidden_projects' => [],
                ],
            ]
        );

        // 6. ผู้ประกอบการ (Employer)
        $employerUser = User::updateOrCreate(
            ['email' => 'hr@techinnovator.co.th'],
            [
                'name' => 'กานดา จัดหางาน',
                'password' => $defaultPassword,
                'role' => 'employer',
                'status' => 'active',
                'email_verified_at' => now(),
            ]
        );

        EmployerProfile::updateOrCreate(
            ['user_id' => $employerUser->id],
            [
                'company_name' => 'Tech Innovator Co., Ltd.',
                'contact_person' => 'กานดา จัดหางาน',
                'contact_phone' => '029876543',
                'business_type' => 'Software House',
                'website_url' => 'https://techinno.co.th',
                'email_verified_at' => now(),
            ]
        );
    }
}
