<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * รายชื่อนักศึกษาที่ผู้ประกอบการคัดเลือกไว้ (Shortlist)
 */
class Shortlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'student_id',
        'target_role_id',
        'note',
    ];

    /**
     * บริษัทผู้คัดเลือก
     */
    public function employer(): BelongsTo
    {
        return $this->belongsTo(EmployerProfile::class, 'employer_id');
    }

    /**
     * นักศึกษาที่ถูกคัดเลือก
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(StudentProfile::class, 'student_id');
    }

    /**
     * ตำแหน่งงานเป้าหมายที่พิจารณา
     */
    public function targetRole(): BelongsTo
    {
        return $this->belongsTo(JobRole::class, 'target_role_id');
    }
}
