<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * บัญชีผู้ใช้งานระบบ (User Account)
 */
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * คอลัมน์ที่อนุญาตให้กำหนดค่าแบบ Mass Assignment
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
    ];

    /**
     * คอลัมน์ที่ซ่อนไว้เมื่อแปลงเป็น Array หรือ JSON
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * การแปลงชนิดข้อมูลของ Attributes
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * โปรไฟล์ของนักศึกษาหรือบุคคลภายนอก
     */
    public function studentProfile(): HasOne
    {
        return $this->hasOne(StudentProfile::class);
    }

    /**
     * โปรไฟล์ของบริษัท/ผู้ประกอบการ
     */
    public function employerProfile(): HasOne
    {
        return $this->hasOne(EmployerProfile::class);
    }

    /**
     * ประวัติการให้ความยินยอมตามสิทธิ PDPA
     */
    public function consentRecords(): HasMany
    {
        return $this->hasMany(ConsentRecord::class);
    }

    /**
     * บันทึกกิจกรรมสำคัญในระบบ (Audit Logs)
     */
    public function auditLogs(): HasMany
    {
        return $this->hasMany(AuditLog::class);
    }

    /**
     * ตรวจสอบว่าผู้ใช้เป็นนักศึกษาในระบบหรือไม่
     */
    public function isStudent(): bool
    {
        return $this->role === 'student';
    }

    /**
     * ตรวจสอบว่าผู้ใช้เป็นบุคคลภายนอกหรือไม่
     */
    public function isExternal(): bool
    {
        return $this->role === 'external';
    }

    /**
     * ตรวจสอบว่าผู้ใช้เป็นอาจารย์หรือไม่
     */
    public function isFaculty(): bool
    {
        return $this->role === 'faculty';
    }

    /**
     * ตรวจสอบว่าผู้ใช้เป็นหัวหน้าสาขาหรือไม่
     */
    public function isDeptHead(): bool
    {
        return $this->role === 'dept_head';
    }

    /**
     * ตรวจสอบว่าผู้ใช้เป็นผู้ประกอบการหรือไม่
     */
    public function isEmployer(): bool
    {
        return $this->role === 'employer';
    }

    /**
     * ตรวจสอบว่าผู้ใช้เป็นแอดมินหรือไม่
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
