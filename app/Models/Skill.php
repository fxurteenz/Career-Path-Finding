<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * ข้อมูลทักษะมาตรฐาน SFIA 9
 */
class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'framework',
        'code',
        'name_th',
        'name_en',
        'category',
        'description_th',
    ];

    /**
     * คำอธิบายความสามารถในแต่ละระดับ (Level 1–4)
     */
    public function levels(): HasMany
    {
        return $this->hasMany(SkillLevel::class, 'skill_id');
    }

    /**
     * ความสัมพันธ์กับตำแหน่งงานผ่าน RoleSkill
     */
    public function roleSkills(): HasMany
    {
        return $this->hasMany(RoleSkill::class, 'skill_id');
    }

    /**
     * ตำแหน่งงานที่ต้องการทักษะนี้
     */
    public function jobRoles(): BelongsToMany
    {
        return $this->belongsToMany(JobRole::class, 'role_skills', 'skill_id', 'role_id')
            ->withPivot(['required_level', 'importance', 'type'])
            ->withTimestamps();
    }

    /**
     * การจับคู่กับรายวิชาในหลักสูตร
     */
    public function courseMaps(): HasMany
    {
        return $this->hasMany(CourseSkillMap::class, 'skill_id');
    }

    /**
     * รายวิชาในหลักสูตรที่ช่วยพัฒนาทักษะนี้
     */
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_skill_maps', 'skill_id', 'course_id')
            ->withPivot(['level_cap', 'grade_config'])
            ->withTimestamps();
    }

    /**
     * ข้อมูลทักษะสะสมของนักศึกษา
     */
    public function studentSkills(): HasMany
    {
        return $this->hasMany(StudentSkill::class, 'skill_id');
    }
}
