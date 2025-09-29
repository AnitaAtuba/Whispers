<?php
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Whispers\WhispersController;
use App\Http\Controllers\Whispers\SiteController;
use App\Http\Controllers\Whispers\PostController;
use App\Http\Controllers\Whispers\CommentController;
use App\Http\Controllers\Whispers\UserController;
use App\Http\Controllers\AdminController;




//whispers homepage

Route::get('/',[WhispersController::class, 'index'])->name('home');
Route::get('/login', function (){ return view('whispers.login');
})->name('login');
Route::get('/register', function (){return view('whispers.register');
})->name('register');



//Whispers AllPosts
Route::prefix("/whispers")->middleware("auth")->controller(SiteController::class)->group(function(){
Route::get('/post','index')->name('whispers.post');
Route::get('/post/{id}','show')->name('whispers.postdetail');
});


//whispers comments
Route::prefix("/whispers")->middleware('auth')->controller(CommentController::class)->group(function(){
Route::post('/postdetail/{id}/comments/ajax','storeAjax')->name('comments.store.ajax');
});


//whispers post likes & hearts
Route::prefix("/whispers")->middleware("auth")->controller(PostController::class)->group(function(){
Route::post('/posts/{id}/like','like')->name('posts.like');
Route::post('/posts/{id}/heart','heart')->name('posts.heart');
});



//whispers dashboard view
Route::get('/dashboard', function () {
    return view('whispers.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



//whispers dashboard 
Route::prefix("/whispers/dashboard")->middleware("auth")->controller(PostController::class)->group(function(){
Route::get('/','index')->name('dashboard');
Route::get('/create','create')->name('dashboard.create');
Route::post('/create','store')->name('dashboard.store');
Route::get('/mywhispers','mywhispers')->name('dashboard.mywhispers');
Route::get("/mywhispers/{id}/edit", "edit")->name("dashboard.postedit");
Route::patch("/mywhispers/{id}/edit", "update")->name("dashboard.postupdate");
Route::get("/mywhispers/{id}/", "delete")->name("dashboard.delete");
Route::delete("/mywhispers/{id}/", "destroy")->name("dashboard.postdelete");
});


// Admin Route
Route::prefix("/admin")->controller(AdminController::class)->middleware("auth","admin")->group(function(){
Route::get("/dashboard","admin_dashboard")->name("admin.dashboard");
Route::get('/dashboard/create','create')->name('admin.create');
Route::post('/dashboard/create','store')->name('admin.store');
Route::get("/dashboard/whispers","admin_whispers")->name("admin.whispers");
Route::get("/dashboard/whispers/{id}/","delete")->name("admin.delete");                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
Route::delete("/dashboard/whispers/{id}/","destroy")->name("admin.whispersDelete");                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
// Route::get("/users","admin_users")->name("admin.users");
});



// Route::get('/', function (){
//     return view('whispers.index');
// });



// whispers user profile
Route::prefix("/whispers")->middleware('auth')->controller(UserController::class)->group(function () {
    Route::get('/dashboard/profile','edit')->name('dashboard.profile');
    Route::patch('/dashboard/profile','update')->name('dashboard.profile');
    // Route::delete('/profile','destroy')->name('profile.destroy');
});



Route::prefix("/")->middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
