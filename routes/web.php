<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendContactController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendCategoryController;
use App\Http\Controllers\FrontendPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SinglePostController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

//Frontend routes

Route::get('/', function () {
    return view('/');
});

Route::get('/', [HomeController::class, 'index'])->name('frontend.home');
/*Route::get('/about-us', [AboutUsController::class, 'index'])->name('frontend.about-us');*/
Route::get('/posts/{post:slug}', [FrontendPostController::class, 'show'])->name('frontend.post.show');
Route::get('/categories/{category:name}', [FrontendCategoryController::class, 'show'])->name('frontend.category.show');
/*Route::get('/contact', [FronstendContactController::class, 'index'])->name('frontend.contact');*/


// Route voor het contactformulier
/*Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');*/



//Backend routes

Route::group(['prefix' => 'backend', 'middleware' => ['auth', 'admin', 'verified']], function(){
    Route::resource('/users', UserController::class); //geeft toegang tot alle 7 functies in UserController
    Route::patch('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::resource('/categories', CategoryController::class);
    Route::patch('/categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::delete('/categories/{id}/forceDelete', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');

    //notificatie route
    Route::patch('/notifications/{id}/read', function ($id) {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $notification->markAsRead();
        return back()->with('message', 'Notification marked as read.');
    })->name('notifications.markAsRead');

});

Route::group(['prefix' => 'backend', 'middleware' => ['auth', 'verified']], function(){
    Route::resource('/posts', PostController::class)->scoped(['post' => 'slug']);
    Route::get('/posts/export/{format}', [PostController::class, 'exportAll'])->name('posts.export');
    Route::get('/posts/export/{format}/{id}', [PostController::class, 'exportOnePost'])->name('post.export');
});


Route::get('/backend', function () {
    return view('backend.index');
})->middleware(['auth', 'verified'])->name('backend.index');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
