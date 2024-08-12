<?php

declare(strict_types=1);

namespace App\Module\Wallet\Models;

use Database\Factories\WalletFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

/**
 * @property int    $id
 * @property string $uuid
 * @property int    $balance
 */
final class Wallet extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'wallets';

    public function getId(): int
    {
        return $this->id;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function setBalance(int $balance): void
    {
        $this->balance = $balance;
    }

    public static function newFactory(): WalletFactory
    {
        return WalletFactory::new();
    }

    protected static function boot(): void
    {
        parent::boot();

        self::creating(function (Wallet $wallet): void {
            $wallet->uuid = Uuid::uuid4()->toString();
        });
    }
}
