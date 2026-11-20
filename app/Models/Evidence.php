<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * ไฟล์หลักฐานและทักษะที่นักศึกษาเสนอ (Self-declared SFIA Skills)
 */
class Evidence extends Model
{
    use HasFactory;

    /**
     * ระบุชื่อตารางในฐานข้อมูล
     *
     * @var string
     */
    protected $table = 'evidence';

    protected $fillable = [
        'record_id',
        'file_path',
        'file_name',
        'file_size_kb',
        'mime_type',
        'claimed_skills',
    ];

    protected function casts(): array
    {
        return [
            'file_size_kb' => 'integer',
            'claimed_skills' => 'array',
        ];
    }

    /**
     * ระเบียนกิจกรรมที่เชื่อมโยงกับหลักฐานนี้
     */
    public function activityRecord(): BelongsTo
    {
        return $this->belongsTo(StudentActivityRecord::class, 'record_id');
    }
}
