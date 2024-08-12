<?php

namespace App\Module\Wallet\Models;

use App\Module\Wallet\Enums\ReasonAccountChange;
use App\Module\Wallet\Enums\TransactionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int                 $id
 * @property string              $uuid
 * @property TransactionType     $type
 * @property ReasonAccountChange $reason
 * @property int                 $wallet_id
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
}
