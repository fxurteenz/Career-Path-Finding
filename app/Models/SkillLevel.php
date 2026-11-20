<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * คำอธิบายความสามารถของทักษะในระดับ 1–4 ตามกรอบ SFIA
 */
class SkillLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'skill_id',
        'level',
        'descriptor_th',
    ];

    protected function casts(): array
    {
        return [
            'level' => 'integer',
        ];
    }

    /**
     * ทักษะ SFIA หลัก
     */
    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }
}
