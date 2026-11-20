<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\JobRole;
use App\Models\RoleSkill;
use App\Models\Skill;
use App\Models\SkillLevel;
use Illuminate\Database\Seeder;

/**
 * Seeder สำหรับแค็ตตาล็อกทักษะ SFIA 9 และ 5 ตำแหน่งงานตั้งต้น
 */
class RoleAndSkillSeeder extends Seeder
{
    public function run(): void
    {
        // 1. เพิ่มทักษะ SFIA 9 และคำอธิบายระดับ 1-4
        $skillsData = [
            [
                'code' => 'PROG',
                'name_th' => 'การพัฒนาซอฟต์แวร์ / การเขียนโปรแกรม',
                'name_en' => 'Software development',
                'category' => 'Development and implementation',
                'description_th' => 'การออกแบบ เขียนโค้ด ทดสอบ และแก้ไขข้อผิดพลาดของโปรแกรมและแอปพลิเคชัน',
                'levels' => [
                    1 => 'ดำเนินการเขียนโค้ดและแก้ไขข้อผิดพลาดแบบง่ายตามคำแนะนำอย่างใกล้ชิด',
                    2 => 'ช่วยเหลืองานเขียนโค้ด ทดสอบ และแก้ไขข้อบกพร่องตามคำแนะนำและข้อกำหนดที่ชัดเจน',
                    3 => 'ออกแบบ เขียนโค้ด ทดสอบ และแก้ไขข้อผิดพลาดของโปรแกรมที่ซับซ้อนตามมาตรฐานที่กำหนด',
                    4 => 'ออกแบบ พัฒนา และตรวจสอบสถาปัตยกรรมโค้ดในระดับระบบ ตรวจทานโค้ดและแนะนำแนวทางแก่ทีม',
                ],
            ],
            [
                'code' => 'TEST',
                'name_th' => 'การทดสอบซอฟต์แวร์',
                'name_en' => 'Software testing',
                'category' => 'Development and implementation',
                'description_th' => 'การวางแผน ออกแบบ ดำเนินการ และรายงานผลการทดสอบซอฟต์แวร์เพื่อประกันคุณภาพ',
                'levels' => [
                    1 => 'ดำเนินการทดสอบตาม Test Case ที่กำหนดไว้และบันทึกผลการทดสอบอย่างครบถ้วน',
                    2 => 'ออกแบบ Test Case พื้นฐาน ดำเนินการทดสอบ และรายงานข้อผิดพลาดอย่างเป็นระบบ',
                    3 => 'วางแผนการทดสอบ ออกแบบชุดทดสอบที่ซับซ้อน และสร้างสคริปต์ Automated Test',
                    4 => 'บริหารจัดการกระบวนการทดสอบทั้งหมด กำหนดกลยุทธ์การทดสอบและการประกันคุณภาพซอฟต์แวร์',
                ],
            ],
            [
                'code' => 'DBDS',
                'name_th' => 'การออกแบบฐานข้อมูล',
                'name_en' => 'Database design',
                'category' => 'Development and implementation',
                'description_th' => 'การวิเคราะห์ ออกแบบ และปรับแต่งโครงสร้างฐานข้อมูลเชิงสัมพันธ์และแบบจำลองข้อมูล',
                'levels' => [
                    1 => 'ช่วยสร้างตารางและดึงข้อมูลตาม Schema ที่กำหนด',
                    2 => 'ปรับแต่งและพัฒนาแบบจำลองข้อมูลเชิงตรรกะเบื้องต้นตามข้อกำหนดของระบบ',
                    3 => 'ออกแบบแบบจำลองข้อมูลทางกายภาพและเชิงตรรกะ ปรับแต่งดัชนีและประสิทธิภาพการประมวลผล',
                    4 => 'กำหนดสถาปัตยกรรมข้อมูลองค์กร ออกแบบโครงสร้างฐานข้อมูลขนาดใหญ่ที่มีความพร้อมใช้งานสูง',
                ],
            ],
            [
                'code' => 'DATM',
                'name_th' => 'การจัดการและการวิเคราะห์ข้อมูล',
                'name_en' => 'Data management',
                'category' => 'Data and analytics',
                'description_th' => 'การจัดเก็บ ประมวลผล ทำความสะอาด วิเคราะห์ และนำเสนอข้อมูลเชิงลึก',
                'levels' => [
                    1 => 'ดำเนินการรวบรวมและตรวจสอบความถูกต้องของข้อมูลเบื้องต้น',
                    2 => 'ประมวลผล จัดเตรียม และทำความสะอาดข้อมูล (Data Cleaning) สำหรับการวิเคราะห์',
                    3 => 'สร้าง Data Pipeline วิเคราะห์ข้อมูลเชิงสถิติ และสร้างแบบจำลองแสดงผลข้อมูล (Data Visualization)',
                    4 => 'ออกแบบกระบวนการกำกับดูแลข้อมูล (Data Governance) และกลยุทธ์การวิเคราะห์ข้อมูลขั้นสูง',
                ],
            ],
            [
                'code' => 'PORT',
                'name_th' => 'การส่งมอบและปรับใช้ระบบ (Release & Deployment)',
                'name_en' => 'Release and deployment',
                'category' => 'Delivery and operation',
                'description_th' => 'การบริหารจัดการขั้นตอนการสร้าง ติดตั้ง และส่งมอบระบบเข้าสู่สภาพแวดล้อมการใช้งานจริง',
                'levels' => [
                    1 => 'ช่วยเหลืองานเตรียมการติดตั้งระบบและปฏิบัติตามคู่มือ Deployment',
                    2 => 'ดำเนินการ Deploy ซอฟต์แวร์ในสภาพแวดล้อมทดสอบตามขั้นตอนที่กำหนด',
                    3 => 'จัดการกระบวนการ CI/CD สร้างสคริปต์อัตโนมัติสำหรับการ Build และ Release ระบบ',
                    4 => 'ออกแบบและบริหารจัดการระบบ Deployment ทั้งหมด และวางแผนรับมือกรณี Rollback',
                ],
            ],
            [
                'code' => 'DESN',
                'name_th' => 'การออกแบบระบบ (Systems Design)',
                'name_en' => 'Systems design',
                'category' => 'Development and implementation',
                'description_th' => 'การกำหนดสถาปัตยกรรมระบบ โครงสร้างส่วนประกอบ และส่วนต่อประสานโปรแกรมประยุกต์',
                'levels' => [
                    1 => 'จัดทำเอกสารและไดอะแกรมสถาปัตยกรรมระบบตามที่ได้รับมอบหมาย',
                    2 => 'ช่วยออกแบบส่วนประกอบย่อยของระบบและอินเทอร์เฟซตามข้อกำหนด',
                    3 => 'ออกแบบสถาปัตยกรรมของระบบและส่วนประสานงาน (API Architecture) ให้รองรับความต้องการทางธุรกิจ',
                    4 => 'กำหนดแนวทางและมาตรฐานสถาปัตยกรรมระบบในภาพรวม และเลือกใช้เทคโนโลยีที่เหมาะสม',
                ],
            ],
        ];

        $skillModels = [];
        foreach ($skillsData as $s) {
            $skill = Skill::updateOrCreate(
                ['code' => $s['code']],
                [
                    'framework' => 'SFIA 9',
                    'name_th' => $s['name_th'],
                    'name_en' => $s['name_en'],
                    'category' => $s['category'],
                    'description_th' => $s['description_th'],
                ]
            );
            $skillModels[$s['code']] = $skill;

            foreach ($s['levels'] as $lvl => $desc) {
                SkillLevel::updateOrCreate(
                    [
                        'skill_id' => $skill->id,
                        'level' => $lvl,
                    ],
                    [
                        'descriptor_th' => $desc,
                    ]
                );
            }
        }

        // 2. เพิ่ม 5 ตำแหน่งงานตั้งต้นและเชื่อมโยงทักษะที่ต้องการ
        $rolesData = [
            [
                'title_th' => 'นักพัฒนาเว็บส่วนหน้า',
                'title_en' => 'Frontend Developer',
                'description_th' => 'พัฒนาและปรับแต่งส่วนประสานงานผู้ใช้เว็บแอปพลิเคชัน (UI/UX) ให้ตอบสนองรวดเร็ว สวยงาม และรองรับทุกอุปกรณ์',
                'skills' => [
                    ['code' => 'PROG', 'level' => 2, 'importance' => 5, 'type' => 'must_have'],
                    ['code' => 'DESN', 'level' => 2, 'importance' => 4, 'type' => 'must_have'],
                    ['code' => 'TEST', 'level' => 1, 'importance' => 3, 'type' => 'nice_to_have'],
                ],
            ],
            [
                'title_th' => 'นักพัฒนาเว็บส่วนหลังและฟูลสแตก',
                'title_en' => 'Backend/Full-stack Developer',
                'description_th' => 'ออกแบบและพัฒนาตรรกะเบื้องหลัง ระบบฐานข้อมูล และ API ที่มีประสิทธิภาพ ปลอดภัย และเชื่อมต่อกับระบบภายนอกได้',
                'skills' => [
                    ['code' => 'PROG', 'level' => 3, 'importance' => 5, 'type' => 'must_have'],
                    ['code' => 'DBDS', 'level' => 2, 'importance' => 5, 'type' => 'must_have'],
                    ['code' => 'TEST', 'level' => 2, 'importance' => 4, 'type' => 'must_have'],
                    ['code' => 'PORT', 'level' => 2, 'importance' => 3, 'type' => 'nice_to_have'],
                ],
            ],
            [
                'title_th' => 'นักวิเคราะห์ข้อมูล',
                'title_en' => 'Data Analyst',
                'description_th' => 'รวบรวม ตรวจสอบ ทำความสะอาด และวิเคราะห์ข้อมูลธุรกิจเพื่อสร้างภาพการแสดงผลและข้อมูลเชิงลึกประกอบการตัดสินใจ',
                'skills' => [
                    ['code' => 'DATM', 'level' => 3, 'importance' => 5, 'type' => 'must_have'],
                    ['code' => 'DBDS', 'level' => 2, 'importance' => 4, 'type' => 'must_have'],
                    ['code' => 'PROG', 'level' => 2, 'importance' => 3, 'type' => 'nice_to_have'],
                ],
            ],
            [
                'title_th' => 'ผู้ทดสอบและประกันคุณภาพซอฟต์แวร์',
                'title_en' => 'Software QA/Tester',
                'description_th' => 'วางแผนการทดสอบ ออกแบบชุดทดสอบ ดำเนินการทดสอบทั้งแบบอัตโนมัติและกำหนดเอง เพื่อให้มั่นใจในคุณภาพซอฟต์แวร์',
                'skills' => [
                    ['code' => 'TEST', 'level' => 3, 'importance' => 5, 'type' => 'must_have'],
                    ['code' => 'PROG', 'level' => 2, 'importance' => 4, 'type' => 'must_have'],
                    ['code' => 'PORT', 'level' => 1, 'importance' => 3, 'type' => 'nice_to_have'],
                ],
            ],
            [
                'title_th' => 'วิศวกรระบบคลาวด์และเดฟออปส์',
                'title_en' => 'DevOps/Cloud Engineer',
                'description_th' => 'ออกแบบและดูแลระบบ CI/CD โครงสร้างพื้นฐานคลาวด์ ความมั่นคงปลอดภัย และการปรับใช้ระบบให้มีความพร้อมใช้งานสูง',
                'skills' => [
                    ['code' => 'PORT', 'level' => 3, 'importance' => 5, 'type' => 'must_have'],
                    ['code' => 'PROG', 'level' => 2, 'importance' => 4, 'type' => 'must_have'],
                    ['code' => 'DBDS', 'level' => 2, 'importance' => 3, 'type' => 'nice_to_have'],
                ],
            ],
        ];

        foreach ($rolesData as $r) {
            $role = JobRole::updateOrCreate(
                ['title_en' => $r['title_en']],
                [
                    'title_th' => $r['title_th'],
                    'description_th' => $r['description_th'],
                    'status' => 'active',
                    'is_initial_seed' => true,
                ]
            );

            foreach ($r['skills'] as $rs) {
                if (isset($skillModels[$rs['code']])) {
                    RoleSkill::updateOrCreate(
                        [
                            'role_id' => $role->id,
                            'skill_id' => $skillModels[$rs['code']]->id,
                        ],
                        [
                            'required_level' => $rs['level'],
                            'importance' => $rs['importance'],
                            'type' => $rs['type'],
                        ]
                    );
                }
            }
        }
    }
}
