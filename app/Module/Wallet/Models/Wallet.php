<?php

declare(strict_types=1);

namespace App\Module\Wallet\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

/**
 * @property int $id
 * @property string $uuid
 * @property int $balance
 * @property string $created_at
 */
final class Wallet extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'wallets';

    public function getBalance(): float
    {
        return $this->balance / 100;
    }

    protected static function boot(): void
    {
        parent::boot();

        self::creating(function (Wallet $wallet): void {
            $wallet->uuid = Uuid::uuid4()->toString();
        });
    }
}
