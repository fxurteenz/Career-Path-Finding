<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * การจับคู่รายวิชากับทักษะ SFIA และเกณฑ์แปลงเกรด
 */
class CourseSkillMap extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'skill_id',
        'level_cap',
        'grade_config',
    ];

    protected function casts(): array
    {
        return [
            'level_cap' => 'integer',
            'grade_config' => 'array',
        ];
    }

    /**
     * รายวิชาในหลักสูตร
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    /**
     * ทักษะ SFIA
     */
    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }
}
