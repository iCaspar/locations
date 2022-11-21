<?php

use App\Http\Controllers\Localities;
use Illuminate\Support\Facades\Route;

Route::get('location/{locality}', [Localities::class, 'findLocality']);
