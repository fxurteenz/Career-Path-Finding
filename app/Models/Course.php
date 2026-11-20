<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * ข้อมูลรายวิชาในหลักสูตร
 */
class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_code',
        'name_th',
        'name_en',
        'credit',
        'prerequisites',
        'curriculum_year',
    ];

    protected function casts(): array
    {
        return [
            'credit' => 'integer',
            'prerequisites' => 'array',
        ];
    }

    /**
     * การจับคู่รายวิชากับทักษะ SFIA
     */
    public function courseSkillMaps(): HasMany
    {
        return $this->hasMany(CourseSkillMap::class, 'course_id');
    }

    /**
     * ทักษะ SFIA ที่เกี่ยวข้องกับรายวิชานี้
     */
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'course_skill_maps', 'course_id', 'skill_id')
            ->withPivot(['level_cap', 'grade_config'])
            ->withTimestamps();
    }

    /**
     * ประวัติผลการเรียนของนักศึกษาในวิชานี้
     */
    public function gradeRecords(): HasMany
    {
        return $this->hasMany(StudentGradeRecord::class, 'course_id');
    }
}
