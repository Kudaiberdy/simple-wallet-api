<?php

use App\Module\Wallet\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/wallets/{uuid}', [Controller::class, 'show'])
    ->name('wallets.show');
Route::post('/wallets/{uuid}/update-account', [Controller::class, 'updateAccount'])
    ->name('wallets.update-account');
