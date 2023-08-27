<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaticController;
use App\Http\Middleware\PublishedArticleMiddleware;
use App\Models\Feedback;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [StaticController::class, 'home'])->name('home');
Route::get('/contacts', [StaticController::class, 'contacts'])->name('contacts');


Route::get('/dashboard', [FeedbackController::class, 'index'])->middleware(['admin'])->name('dashboard');
Route::post('/feedbacks/store', [FeedbackController::class, 'store'])->name('feedbacks.store');

/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

require __DIR__.'/auth.php';

Route::resource('articles', ArticleController::class);
Route::resource('products', ProductController::class);
Route::resource('partners', PartnerController::class);

Route::delete('/feedbacks/{feedback}', function (Feedback $feedback) {
    $feedback->delete();
    return redirect()->route('dashboard');
})->name('feedbacks.destroy');
