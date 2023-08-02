<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth'], function (){
    Route::get('posts/trash', [\App\Http\Controllers\PostController::class, 'trashed'])->name('posts.trashed');
    Route::get('posts/{id}/restore', [\App\Http\Controllers\PostController::class, 'restore'])->name('posts.restore');
    Route::delete('posts/{id}/force-delete', [\App\Http\Controllers\PostController::class, 'forceDelete'])->name('posts.force_delete');

    Route::resource('posts',\App\Http\Controllers\PostController::class);

    Route::get('unavailable', function (){
        return view('unavailable');
    })->name('unavailable');

    Route::group(['middleware' => 'authCheck2'], function (){
        Route::get('dashboard', function (){
            return view('dashboard');
        });
        Route::get('profile', function (){
            return view('profile');
        });
    });

    Route::get('contact', function (){
        $posts = \App\Models\Post::all();
        return view('contact', compact('posts'));
    });

    Route::get('send-mail', function (){
//    \Illuminate\Support\Facades\Mail::raw('this is an email from laravel', function ($message){
//        $message->to('mhmdahmdzero@gmail.com')->subject('Laravel');
//    });

        \Illuminate\Support\Facades\Mail::send(new \App\Mail\OrderShipped());

        dd('success');
    });

    Route::get('get-session', function (\Illuminate\Http\Request $request){
//    $data = session()->all();
        $data = $request->session()->all();
//    $data = $request->session()->get('_token');

        dd($data);
    });

    Route::get('save-session', function (\Illuminate\Http\Request $request){
        $request->session()->put([
            'user_status' => 'logged_in',
            'test' => 'value',
            'user_id' => '1234'
        ]);
        return redirect('get-session');
    });

    Route::get('flash-session', function (\Illuminate\Http\Request $request){
        $request->session()->flash('test3', 'false');
        return redirect('get-session');
    });

    Route::get('destroy-session', function (\Illuminate\Http\Request $request){
        $request->session()->forget(['user_id', 'user_status']);
        return redirect('get-session');
    });

    Route::get('forget-cache', function (){
        \Illuminate\Support\Facades\Cache::forget('posts');

        dd('deleted cache');
    });

    Route::get('user-data', function (){
//   return \Illuminate\Support\Facades\Auth::user();
        return auth()->user();
    });
});

Route::get('send-mail-job', function (){

    \App\Jobs\SendMail::dispatch();

    dd('Email Sent!');
});

Route::get('user-register', function (){
    $email = 'user@gmail.com';
   event(new \App\Events\UserRegistered($email));

   dd('Welcome email has been sent!');
});

Route::get('greeting/{locale}', function ($locale){
    \Illuminate\Support\Facades\App::setLocale($locale);

   return view('greeting');
})->name('greeting');
