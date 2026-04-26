<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\TagController;

Route::post('memos', [MemoController::class, 'store'])->name('memos.store');
Route::get('memos', [MemoController::class, 'index'])->name('memos.index');
Route::delete('memos/{id}', [MemoController::class, 'destroy'])->name('memos.destroy');

Route::get('tags', [TagController::class, 'index'])->name('tags.index');
