<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AskController;
use App\Http\Controllers\SearchController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//frontend routes
Route::get('/', [App\Http\Controllers\FrontEndController::class, 'help'])->name('website');

Route::get('/community', [App\Http\Controllers\FrontEndController::class, 'community'])->name('website.community');

Route::get('/help', [App\Http\Controllers\FrontEndController::class, 'help'])->name('website.help');

Route::get('/about', [App\Http\Controllers\FrontEndController::class, 'about'])->name('website.about');

Route::get('/contact', [App\Http\Controllers\FrontEndController::class, 'contact'])->name('website.contact');

Route::get('/ask', [App\Http\Controllers\FrontEndController::class, 'ask'])->name('website.ask');

Route::get('/category/{slug}', [App\Http\Controllers\FrontEndController::class, 'category'])->name('website.category');

Route::get('/tag/{slug}', [App\Http\Controllers\FrontEndController::class, 'tag'])->name('website.tag');

Route::get('/post/{slug}', [App\Http\Controllers\FrontEndController::class, 'post'])->name('website.post');

Route::get('/question/{slug}', [App\Http\Controllers\FrontEndController::class, 'question'])->name('website.question');

Route::post('/contact', [App\Http\Controllers\FrontEndController::class, 'send_message'])->name('website.contact');

Route::post('/ask', [App\Http\Controllers\FrontEndController::class, 'ask_question'])->name('website.ask');

Route::get('/search', [App\Http\Controllers\FrontEndController::class, 'search'])->name('website.search');

Route::post('/subscribe', [App\Http\Controllers\FrontEndController::class, 'subscribe'])->name('website.subscribe');


//Admin Panel Routes
Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function (){

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('category', 'CategoryController');

    Route::resource('tag', 'TagController');

    Route::resource('post', 'PostController');

    Route::resource('user', 'UserController');

    Route::resource('contact', 'ContactController');

    Route::resource('ask', 'AskController');

    Route::resource('search', 'SearchController');

    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
    Route::post('/profile', [App\Http\Controllers\UserController::class, 'profile_update'])->name('user.profile.update');

    //setting
    Route::get('setting', [App\Http\Controllers\SettingController::class, 'edit'])->name('setting.edit');
    Route::post('setting', [App\Http\Controllers\SettingController::class, 'update'])->name('setting.update');

    //contact
    Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
    Route::get('/contact/show/{id}', [App\Http\Controllers\ContactController::class, 'show'])->name('contact.show');
    Route::get('/contact/delete/{id}', [App\Http\Controllers\ContactController::class, 'destroy'])->name('contact.destroy');

    //questions
    Route::get('/questions', [App\Http\Controllers\AskController::class, 'index'])->name('questions.index');

    //searches
    Route::get('/searches', [App\Http\Controllers\SearchController::class, 'index'])->name('searches.index');
    Route::get('/searches/delete/{id}', [App\Http\Controllers\SearchController::class, 'destroy'])->name('searches.destroy');

    
    
    
});

// Route::get('/test', function(){
//     $id = 60;
//     $posts = App\Models\Post::all();
//     foreach($posts as $post)
//     {
//         $post->image = "https://loremflickr.com/640/480/".$id;
//         $post->save();
//         $id++;
//     }
//     return $posts;
// });