<?php

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\livewire;
use App\Livewire\Services\ServiceDetailPage;
use App\Livewire\Services\ServicesPage;
use App\Livewire\Users\UsersPage;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return redirect("/services");
});
Route::get('/services', ServicesPage::class);
Route::get('/services/{id}', ServiceDetailPage::class);
Route::get('/users', UsersPage::class);



// 1. make full page component
//  for exp HomePage or ServicePage

// use this

// use App\Http\Controllers\OrderController;

// Route::controller(OrderController::class)->group(function () {
//     Route::get('/orders/{id}', 'show');
//     Route::post('/orders', 'store');
// });
// Route::get('comments', \App\Http\Livewire\CommentsList::class)->name('comments.index');

// Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

// Route::middleware('auth')->group(function () {
//     Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
//     Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
// });