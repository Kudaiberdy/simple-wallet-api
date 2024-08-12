<?php

use App\Module\Wallet\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/wallets/{uuid}', [Controller::class, 'show']);
