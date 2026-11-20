<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * ข้อมูลเรซูเม่และลิงก์แชร์ออนไลน์ (Token URL)
 */
class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'target_role_id',
        'share_token',
        'expires_at',
        'view_count',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'expires_at' => 'datetime',
            'view_count' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    /**
     * นักศึกษาเจ้าของเรซูเม่
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(StudentProfile::class, 'student_id');
    }

    /**
     * ตำแหน่งงานเป้าหมายของเรซูเม่ฉบับนี้
     */
    public function targetRole(): BelongsTo
    {
        return $this->belongsTo(JobRole::class, 'target_role_id');
    }

    /**
     * ตรวจสอบว่าลิงก์แชร์หมดอายุแล้วหรือไม่
     */
    public function isExpired(): bool
    {
        return $this->expires_at !== null && $this->expires_at->isPast();
    }
}
