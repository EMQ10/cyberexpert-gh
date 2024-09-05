<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ExpertMessageController;


// Route::get('/', function () {
//     return view('experts');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/expert/{id}/profile', [HomeController::class, 'show'])->name('expert.profile');

Route::get('/test', function () {
    return view('test');
});
Route::get('/dashboard', function () {
    return redirect('experts');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/expert/area_of_expertise/{id}', [ExpertController::class, 'expertise'])->name('expert.expertise');

Route::get('/expert/message/{id}', [ExpertController::class, 'message'])->name('expert.message');
Route::post('/expert/message', [ExpertMessageController::class, 'store'])->name('expertise.message.store');

Route::get('/feedback', [ExpertMessageController::class, 'feedback'])->name('expertise.message.feedback');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Our resource routes
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('experts', ExpertController::class);
    Route::post('/expert/picture/{id}', [ExpertController::class, 'picture'])->name('picture');
    Route::resource('areas', AreaController::class);
    Route::get('/expert/publish/{id}', [ExpertController::class, 'publish'])->name('expert.publish');
    Route::get('/expert/unpublish/{id}', [ExpertController::class, 'unpublish'])->name('expert.unpublish');

    Route::post('/expert/expertise', [ExpertController::class, 'unassign_expertise'])->name('expertise.remove');

    Route::get('/messages', [ExpertMessageController::class, 'index'])->name('message.index');
    Route::get('/messages/details/{id}', [ExpertMessageController::class, 'show'])->name('message.show');
    Route::get('/messages/mail/{id}', [ExpertMessageController::class, 'mail'])->name('expert.mail');

    Route::post('/mark-as-read', [ExpertMessageController::class, 'markNotification'])->name('markNotification');

});

require __DIR__.'/auth.php';
