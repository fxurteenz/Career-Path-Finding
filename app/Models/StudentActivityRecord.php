<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * ระเบียนกิจกรรม โครงงาน ใบรับรอง หรือผลงานของนักศึกษา
 */
class StudentActivityRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'activity_type',
        'title',
        'role_description',
        'activity_date',
        'external_url',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'activity_date' => 'date',
        ];
    }

    /**
     * นักศึกษาผู้ยื่นผลงาน
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(StudentProfile::class, 'student_id');
    }

    /**
     * ไฟล์หลักฐานที่แนบกับผลงานนี้
     */
    public function evidences(): HasMany
    {
        return $this->hasMany(Evidence::class, 'record_id');
    }

    /**
     * ตรวจสอบว่าผลงานได้รับการอนุมัติแล้วหรือไม่
     */
    public function isVerified(): bool
    {
        return $this->status === 'verified';
    }

    /**
     * ตรวจสอบว่ารอการตรวจหรือไม่
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }
}
