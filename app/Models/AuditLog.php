<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * บันทึกการกระทำสำคัญในระบบ (Audit Log) เพื่อความโปร่งใสและตรวจสอบได้
 */
class AuditLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'action',
        'entity_type',
        'entity_id',
        'details',
        'ip_address',
    ];

    protected function casts(): array
    {
        return [
            'details' => 'array',
        ];
    }

    /**
     * บัญชีผู้ใช้งานที่กระทำการ (nullable สำหรับ Guest หรือ System)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
