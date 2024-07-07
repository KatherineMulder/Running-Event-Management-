<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminThreadController;
use App\Http\Controllers\AdminMessageController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingController;


Route::get('/', function () {
    return view('welcome'); 
})->name('home');


Route::get('/auth', function () {
    return view('auth.auth');
})->name('auth');

Route::post('/signup', [UserController::class, 'register'])->name('signup');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/account', [UserController::class, 'showAccountForm'])->name('account');
    Route::post('/account/update', [UserController::class, 'updateAccount'])->name('account.update');
    Route::post('/account/deactivate', [UserController::class, 'deactivateAccount'])->name('account.deactivate');

    // profile Management
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
    Route::post('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/password/update', [UserController::class, 'updatePassword'])->name('password.update');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::resources([
        '/admin/users' => AdminUserController::class,
        '/admin/events' => AdminEventController::class,
        '/admin/bookings' => AdminBookingController::class,
        '/admin/categories' => AdminCategoryController::class,
        '/admin/threads' => AdminThreadController::class,
        '/admin/messages' => AdminMessageController::class,
    ]);
});



Route::middleware('auth')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});


Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/{post}', [ForumController::class, 'show'])->name('forum.show');


Route::middleware(['auth'])->group(function () {
    Route::post('/forum/store', [ForumController::class, 'store'])->name('forum.store');
    Route::get('/my-posts', [ForumController::class, 'myPosts'])->name('forum.myPosts');
    Route::get('/forum/{post}/edit', [ForumController::class, 'edit'])->name('forum.edit');
    Route::put('/forum/{post}', [ForumController::class, 'update'])->name('forum.update');
    Route::delete('/forum/{post}', [ForumController::class, 'destroy'])->name('forum.destroy');

    //  view user's posts
    Route::get('/view-my-posts', [ForumController::class, 'viewMyPosts'])->name('view.my.posts');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/events/{id}/book', [EventController::class, 'book'])->name('events.book');
    Route::post('/events/{id}/book', [BookingController::class, 'store'])->name('events.book.store');
    Route::get('/bookings/summary', [BookingController::class, 'summary'])->name('bookings.summary');
    Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
});
Route::get('/events', [EventController::class, 'index'])->name('events.index');


Route::resource('admin/events', AdminEventController::class)->middleware(['auth', 'admin']);
