<?php

use App\Enum\RoleEnum;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaticController;
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

require __DIR__.'/auth.php';

$resources = [
    'articles' => ArticleController::class,
    'products' => ProductController::class,
    'partners' => PartnerController::class,
];
foreach ($resources as $resource => $controllerClass) {
    Route::resource($resource, $controllerClass, [
        'except' => ['index', 'show']
    ])->middleware('role:' . RoleEnum::ADMIN->value);
    Route::resource($resource, $controllerClass, [
        'only' => ['index', 'show']
    ]);
}

Route::delete('/feedbacks/{feedback}', function (Feedback $feedback) {
    $feedback->delete();
    return redirect()->route('dashboard');
})->name('feedbacks.destroy')->middleware('role:' . RoleEnum::ADMIN->value);
