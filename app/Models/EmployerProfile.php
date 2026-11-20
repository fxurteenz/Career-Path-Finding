<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * ข้อมูลโปรไฟล์ของผู้ประกอบการ/บริษัท
 */
class EmployerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'contact_person',
        'contact_phone',
        'business_type',
        'website_url',
        'email_verified_at',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }

    /**
     * บัญชีผู้ใช้งานหลัก
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * รายการนักศึกษาที่บริษัทบันทึกไว้ใน Shortlist
     */
    public function shortlists(): HasMany
    {
        return $this->hasMany(Shortlist::class, 'employer_id');
    }
}
