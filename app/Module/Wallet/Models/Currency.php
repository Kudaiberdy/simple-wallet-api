<?php

namespace App\Module\Wallet\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $code
 */
class Currency extends Model
{
    use HasFactory;

    protected $table = 'currencies';
}
