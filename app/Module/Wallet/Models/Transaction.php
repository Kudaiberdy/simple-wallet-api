<?php

namespace App\Module\Wallet\Models;

use App\Module\Wallet\Enums\ReasonAccountChange;
use App\Module\Wallet\Enums\TransactionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

/**
 * @property int                 $id
 * @property string              $uuid
 * @property TransactionType     $type
 * @property ReasonAccountChange $reason
 * @property int                 $wallet_id
 * @property int                 $currency_id
 * @property int                 $amount
 */
class Transaction extends Model
{
    use HasFactory;

    public $table = 'transactions';

    public function casts(): array
    {
        return [
            'type'   => TransactionType::class,
            'reason' => ReasonAccountChange::class,
        ];
    }

    public function getType(): TransactionType
    {
        return $this->type;
    }

    public function getCurrencyId(): int
    {
        return $this->currency_id;
    }

    public function getAmount(): float
    {
        return $this->amount / 100;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = convert_to_cents($amount);
    }

    protected static function boot(): void
    {
        parent::boot();

        self::creating(function (self $wallet): void {
            $wallet->uuid = UUid::uuid4()->toString();
        });
    }

}
