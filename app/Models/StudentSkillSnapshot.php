<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * บันทึก Snapshot ทักษะของนักศึกษาประจำภาคเรียน (สำหรับดูกราฟพัฒนาการ)
 */
class StudentSkillSnapshot extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'academic_year',
        'semester',
        'skills_snapshot',
        'recorded_at',
    ];

    protected function casts(): array
    {
        return [
            'semester' => 'integer',
            'skills_snapshot' => 'array',
            'recorded_at' => 'datetime',
        ];
    }

    /**
     * นักศึกษาเจ้าของประวัติ Snapshot
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(StudentProfile::class, 'student_id');
    }
}
