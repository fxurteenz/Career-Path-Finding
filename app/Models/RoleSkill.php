<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * ความสัมพันธ์และความต้องการทักษะของแต่ละตำแหน่งงาน
 */
class RoleSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'skill_id',
        'required_level',
        'importance',
        'type',
    ];

    protected function casts(): array
    {
        return [
            'required_level' => 'integer',
            'importance' => 'integer',
        ];
    }

    /**
     * ตำแหน่งงาน
     */
    public function jobRole(): BelongsTo
    {
        return $this->belongsTo(JobRole::class, 'role_id');
    }

    /**
     * ทักษะ SFIA
     */
    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }

    /**
     * ตรวจสอบว่าเป็นทักษะจำเป็น (Must-have) หรือไม่
     */
    public function isMustHave(): bool
    {
        return $this->type === 'must_have';
    }
}
