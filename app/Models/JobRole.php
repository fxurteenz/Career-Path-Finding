<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * ตำแหน่งงานเป้าหมาย (Job Role)
 */
class JobRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_th',
        'title_en',
        'description_th',
        'status',
        'is_initial_seed',
    ];

    protected function casts(): array
    {
        return [
            'is_initial_seed' => 'boolean',
        ];
    }

    /**
     * ทักษะและความสำคัญที่ตำแหน่งงานนี้ต้องการ (RoleSkill)
     */
    public function roleSkills(): HasMany
    {
        return $this->hasMany(RoleSkill::class, 'role_id');
    }

    /**
     * ทักษะทั้งหมดที่ต้องการสำหรับตำแหน่งงานนี้
     */
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'role_skills', 'role_id', 'skill_id')
            ->withPivot(['required_level', 'importance', 'type'])
            ->withTimestamps();
    }

    /**
     * ทักษะจำเป็นขั้นวิกฤต (Must-have Skills)
     */
    public function mustHaveSkills(): BelongsToMany
    {
        return $this->skills()->wherePivot('type', 'must_have');
    }

    /**
     * ทักษะเสริมที่ควรมี (Nice-to-have Skills)
     */
    public function niceToHaveSkills(): BelongsToMany
    {
        return $this->skills()->wherePivot('type', 'nice_to_have');
    }

    /**
     * เรซูเม่ที่ระบุตำแหน่งงานนี้เป็นเป้าหมาย
     */
    public function resumes(): HasMany
    {
        return $this->hasMany(Resume::class, 'target_role_id');
    }

    /**
     * รายการคัดเลือกของผู้ประกอบการที่เจาะจงตำแหน่งนี้
     */
    public function shortlists(): HasMany
    {
        return $this->hasMany(Shortlist::class, 'target_role_id');
    }
}
