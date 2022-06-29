<?php
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     $posts = \App\Models\Post::all();
//     return view('welcome', compact('posts'));
// })->name('journal');

// Route::get('/details/{id}', [App\Http\Controllers\BlogManagement::class, 'show'])->name('blog.details');

// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->group(function () {
    
//     Route::middleware(App\Http\Middleware\EnsureCurrentTeam::class)->group(function () {
        
//         Route::prefix('blog')->controller(App\Http\Controllers\BlogManagement::class)->group(function () {
//             Route::get('/posts','index')->name('blog.posts');
//             Route::get('/edit/post/{id}', 'edit')->middleware('can-update')->name('blog.edit-post');
//             Route::get('/edit/delete/{id}', 'destroy')->middleware('can-delete')->name('blog.delete-post');

//             Route::put('/edit/post/{id}', 'update')->middleware('can-update')->name('blog.update-post');
            
//         });

//         Route::get('/dashboard', function(){
//             $posts = \App\Models\Post::all();
//             return view('dashboard', compact('posts'));
//         })->name('dashboard');
        
//     });

//     Route::prefix('blog')->controller(App\Http\Controllers\TeamController::class)->group(function () {
//         Route::get('/team/{id}','team')->name('blog.team-profile');
//     });
    

//     Route::prefix('blog')->controller(App\Http\Controllers\UserController::class)->group(function () {
//         Route::get('/user/{id}','profile')->name('blog.user');
//     });
// });

Route::domain('laravel.jetstream.blog.test')->group(function() {
    Route::get('/', function () {
        $posts = \App\Models\Post::all();
        return view('welcome', compact('posts'));
    })->name('journal');
    
    Route::get('/details/{id}', [App\Http\Controllers\BlogManagement::class, 'show'])->name('blog.details');
    
    Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->group(function () {
        
        Route::middleware(App\Http\Middleware\EnsureCurrentTeam::class)->group(function () {
            
            Route::prefix('blog')->controller(App\Http\Controllers\BlogManagement::class)->group(function () {
                Route::get('/posts','index')->name('blog.posts');
                Route::get('/edit/post/{id}', 'edit')->middleware('can-update')->name('blog.edit-post');
                Route::get('/edit/delete/{id}', 'destroy')->middleware('can-delete')->name('blog.delete-post');
    
                Route::put('/edit/post/{id}', 'update')->middleware('can-update')->name('blog.update-post');
                
            });
    
            Route::get('/dashboard', function(){
                $posts = \App\Models\Post::all();
                return view('dashboard', compact('posts'));
            })->name('dashboard');
            
        });
    
        Route::prefix('blog')->controller(App\Http\Controllers\TeamController::class)->group(function () {
            Route::get('/team/{id}','team')->name('blog.team-profile');
        });
        
    
        Route::prefix('blog')->controller(App\Http\Controllers\UserController::class)->group(function () {
            Route::get('/user/{id}','profile')->name('blog.user');
        });
    });
});


Route::domain('{blog:domain}')->where(['blog' => '.+'])->group(function () {
    Route::get('/', function() {
        return view('tenant_post.home', [
            'posts' => Post::latest()->get(),
        ]);
    });

 });