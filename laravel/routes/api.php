<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemoController;

Route::post('memos', [MemoController::class, 'store'])->name('memos.store');
Route::get('memos', [MemoController::class, 'index'])->name('memos.index');
