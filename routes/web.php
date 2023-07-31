<?php

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


