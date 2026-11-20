<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * ข้อมูลโปรไฟล์นักศึกษาและบุคคลภายนอก
 */
class StudentProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'student_code',
        'first_name',
        'last_name',
        'program_name',
        'year_level',
        'phone',
        'linkedin_url',
        'opt_in_employer',
        'visibility_settings',
    ];

    protected function casts(): array
    {
        return [
            'opt_in_employer' => 'boolean',
            'visibility_settings' => 'array',
            'year_level' => 'integer',
        ];
    }

    /**
     * บัญชีผู้ใช้งานหลัก
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * ระเบียนผลการเรียนในรายวิชา
     */
    public function gradeRecords(): HasMany
    {
        return $this->hasMany(StudentGradeRecord::class, 'student_id');
    }

    /**
     * ระเบียนกิจกรรม ผลงาน โครงงาน หรือใบรับรอง
     */
    public function activityRecords(): HasMany
    {
        return $this->hasMany(StudentActivityRecord::class, 'student_id');
    }

    /**
     * ตาราง Cache ระดับทักษะล่าสุด
     */
    public function skills(): HasMany
    {
        return $this->hasMany(StudentSkill::class, 'student_id');
    }

    /**
     * ประวัติ Snapshot ทักษะรายภาคเรียน
     */
    public function snapshots(): HasMany
    {
        return $this->hasMany(StudentSkillSnapshot::class, 'student_id');
    }

    /**
     * เรซูเม่และลิงก์แชร์ออนไลน์
     */
    public function resumes(): HasMany
    {
        return $this->hasMany(Resume::class, 'student_id');
    }

    /**
     * รายการที่บริษัทบันทึกไว้ใน Shortlist
     */
    public function shortlists(): HasMany
    {
        return $this->hasMany(Shortlist::class, 'student_id');
    }

    /**
     * ชื่อ-นามสกุลเต็มของผู้เรียน
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
