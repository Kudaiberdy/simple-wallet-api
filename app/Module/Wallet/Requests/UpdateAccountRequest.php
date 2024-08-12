<?php

declare(strict_types=1);

namespace App\Module\Wallet\Requests;

use App\Module\Wallet\Enums\ReasonAccountChange;
use App\Module\Wallet\Enums\TransactionType;
use Illuminate\Foundation\Http\FormRequest;

final class UpdateAccountRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'transactionType' => ['required', 'string', 'in:' . implode(',', TransactionType::getValues())],
            'amount'          => ['required', 'numeric', 'min:0'],
            'currency'        => ['required', 'string', 'exists:currencies,code'],
            'changeReason'    => ['required', 'string', 'in:' . implode(',', ReasonAccountChange::getValues())],
        ];
    }
}
