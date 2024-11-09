<?php

use Mxent\Sample\Http\Controllers\SampleController;

Route::get('/', [SampleController::class, 'index'])->name('index');
