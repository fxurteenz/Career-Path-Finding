<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * บันทึกประวัติความยินยอมและการใช้สิทธิตามกฎหมาย PDPA
 */
class ConsentRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'consent_version',
        'is_opt_in',
        'action',
        'ip_address',
    ];

    protected function casts(): array
    {
        return [
            'is_opt_in' => 'boolean',
        ];
    }

    /**
     * บัญชีผู้ใช้ที่ให้ความยินยอม
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
