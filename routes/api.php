<?php

use App\Http\Controllers\Locations\Locations;
use Illuminate\Support\Facades\Route;

Route::get('location/{locality}', [Locations::class, 'findLocality']);
