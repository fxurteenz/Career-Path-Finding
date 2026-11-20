<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * ตาราง Cache เก็บระดับทักษะล่าสุดของนักศึกษา
 */
class StudentSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'skill_id',
        'level',
        'is_verified',
        'derived_from',
    ];

    protected function casts(): array
    {
        return [
            'level' => 'integer',
            'is_verified' => 'boolean',
            'derived_from' => 'array',
        ];
    }

    /**
     * นักศึกษาเจ้าของทักษะ
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(StudentProfile::class, 'student_id');
    }

    /**
     * ทักษะ SFIA
     */
    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }
}
