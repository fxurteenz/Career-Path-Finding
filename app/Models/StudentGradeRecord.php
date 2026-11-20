<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * ระเบียนผลการเรียนของนักศึกษาในรายวิชา
 */
class StudentGradeRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id',
        'grade',
        'semester',
        'academic_year',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'semester' => 'integer',
        ];
    }

    /**
     * นักศึกษาเจ้าของผลการเรียน
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(StudentProfile::class, 'student_id');
    }

    /**
     * รายวิชาที่เรียน
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    /**
     * ตรวจสอบว่าได้รับการยืนยันผลการเรียนแล้วหรือไม่
     */
    public function isVerified(): bool
    {
        return $this->status === 'verified';
    }
}
