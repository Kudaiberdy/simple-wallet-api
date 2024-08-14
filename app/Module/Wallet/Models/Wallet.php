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
 * @property int    $currency_id
 */
final class Wallet extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'wallets';

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getBalance(): float
    {
        return $this->balance === 0 ? 0 : $this->balance / 100;
    }

    public function getCurrencyId(): int
    {
        return $this->currency_id;
    }

    public function setBalance(float $balance): void
    {
        $this->balance = convert_to_cents($balance);
    }

    public static function newFactory(): WalletFactory
    {
        return WalletFactory::new();
    }

    protected static function boot(): void
    {
        parent::boot();

        self::creating(function (self $wallet): void {
            $wallet->uuid = Uuid::uuid4()->toString();
        });
    }
}
