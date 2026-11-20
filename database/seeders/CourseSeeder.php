<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseSkillMap;
use App\Models\Skill;
use Illuminate\Database\Seeder;

/**
 * Seeder สำหรับรายวิชาตัวอย่างในหลักสูตร IT และการจับคู่ทักษะ SFIA
 */
class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $progSkill = Skill::where('code', 'PROG')->first();
        $testSkill = Skill::where('code', 'TEST')->first();
        $dbdsSkill = Skill::where('code', 'DBDS')->first();
        $datmSkill = Skill::where('code', 'DATM')->first();
        $portSkill = Skill::where('code', 'PORT')->first();
        $desnSkill = Skill::where('code', 'DESN')->first();

        $defaultGradeConfigL1 = [
            'A' => 1, 'B+' => 1, 'B' => 1, 'C+' => 1, 'C' => 1, 'D+' => 0, 'D' => 0, 'F' => 0,
        ];

        $defaultGradeConfigL2 = [
            'A' => 2, 'B+' => 2, 'B' => 1, 'C+' => 1, 'C' => 1, 'D+' => 0, 'D' => 0, 'F' => 0,
        ];

        $coursesData = [
            [
                'code' => 'IT101',
                'name_th' => 'การเขียนโปรแกรมคอมพิวเตอร์เบื้องต้น',
                'name_en' => 'Intro to Computer Programming',
                'credit' => 3,
                'prerequisites' => [],
                'year' => '2565',
                'skills' => [
                    ['skill' => $progSkill, 'level_cap' => 1, 'grade_config' => $defaultGradeConfigL1],
                ],
            ],
            [
                'code' => 'IT102',
                'name_th' => 'การเขียนโปรแกรมเชิงวัตถุ',
                'name_en' => 'Object-Oriented Programming',
                'credit' => 3,
                'prerequisites' => ['IT101'],
                'year' => '2565',
                'skills' => [
                    ['skill' => $progSkill, 'level_cap' => 2, 'grade_config' => $defaultGradeConfigL2],
                ],
            ],
            [
                'code' => 'IT201',
                'name_th' => 'ระบบฐานข้อมูลและการจัดการข้อมูล',
                'name_en' => 'Database Systems and Data Management',
                'credit' => 3,
                'prerequisites' => ['IT101'],
                'year' => '2565',
                'skills' => [
                    ['skill' => $dbdsSkill, 'level_cap' => 2, 'grade_config' => $defaultGradeConfigL2],
                ],
            ],
            [
                'code' => 'IT202',
                'name_th' => 'การพัฒนาเว็บแอปพลิเคชัน',
                'name_en' => 'Web Application Development',
                'credit' => 3,
                'prerequisites' => ['IT102', 'IT201'],
                'year' => '2565',
                'skills' => [
                    ['skill' => $progSkill, 'level_cap' => 2, 'grade_config' => $defaultGradeConfigL2],
                    ['skill' => $desnSkill, 'level_cap' => 2, 'grade_config' => $defaultGradeConfigL2],
                ],
            ],
            [
                'code' => 'IT301',
                'name_th' => 'วิศวกรรมซอฟต์แวร์และการประกันคุณภาพ',
                'name_en' => 'Software Engineering and Quality Assurance',
                'credit' => 3,
                'prerequisites' => ['IT202'],
                'year' => '2565',
                'skills' => [
                    ['skill' => $testSkill, 'level_cap' => 2, 'grade_config' => $defaultGradeConfigL2],
                    ['skill' => $portSkill, 'level_cap' => 2, 'grade_config' => $defaultGradeConfigL2],
                ],
            ],
            [
                'code' => 'IT302',
                'name_th' => 'การวิเคราะห์ข้อมูลและการสร้างแบบจำลอง',
                'name_en' => 'Data Analytics and Visualization',
                'credit' => 3,
                'prerequisites' => ['IT201'],
                'year' => '2565',
                'skills' => [
                    ['skill' => $datmSkill, 'level_cap' => 2, 'grade_config' => $defaultGradeConfigL2],
                ],
            ],
        ];

        foreach ($coursesData as $c) {
            $course = Course::updateOrCreate(
                ['course_code' => $c['code']],
                [
                    'name_th' => $c['name_th'],
                    'name_en' => $c['name_en'],
                    'credit' => $c['credit'],
                    'prerequisites' => $c['prerequisites'],
                    'curriculum_year' => $c['year'],
                ]
            );

            foreach ($c['skills'] as $cs) {
                if ($cs['skill']) {
                    CourseSkillMap::updateOrCreate(
                        [
                            'course_id' => $course->id,
                            'skill_id' => $cs['skill']->id,
                        ],
                        [
                            'level_cap' => $cs['level_cap'],
                            'grade_config' => $cs['grade_config'],
                        ]
                    );
                }
            }
        }
    }
}
