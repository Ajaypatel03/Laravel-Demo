<?php
use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/greeting', function () {
//     return "hello world!";
// });

// Route::get('/greeting/{id}', function ($id) {
//     return "this is id no. " .$id;
// });

// Route::get('/greeting/{name?}', function () {
//     return "this is id no. ";
// });

//Route::redirect('/' , 'login') ;

// Route::get('/login', function () {
//     return '<a href="/about"> about </a> ';
// });

// Route::get('about', function () {
//     return "About page ";
// });


// views


//Route::view('greeting1', 'greeting');

// Route::get('greeting', function () {
//     $name ='ajay patel';
//     return view('greeting',['name' => $name]);
// });

// Route::get('greeting', function () {
//     $name ='ajay patel';
//     return view('greeting',compact('name'));
// });

// Route::get('greeting', function () {
//     $name ='ajay patel';
//     return view('greeting')->with('name',$name);
// });

// Route::get('/test', function () {
//    // $name ='ajay patel';
//     return view('admin.profile');
// });

// Route::view('user', 'user');
// Route::view('post', 'post');

// Route::get('users', [UserController::class,'index']);
// Route::get('users/show/{id}', [UserController::class,'show']);
// Route::get('users/show/{id}', [UserController::class,'show']);
// Route::resource('posts',PostController::class);

//    Route::get('/connection', function () {
//         // Test database connection
//         try {
//             DB::connection()->getPdo();
//             return 'connected to the database!';
//         } catch (\Exception $e) {
//             die("Could not connect to the database.  Please check your configuration. error:" . $e );
//         }

//    });

    // Route::get('test', function () {

    //     // Post::create([
    //     //     'title'=> 'Laravel-8',
    //     //     'description'=>' laravel - 8 is a framwork',
    //     //     'is_published'=> false,
    //     //     'is_active'=> false

    //     // ]);
    //      // return 'inserted succesfully';

    //     //   $posts = Post::find(2);
    //     //   return $posts;

    //         $posts = Post::findOrFail(3);
    //         $posts -> delete();
    //         return 'deleted succesfully';
    // });

    // Route::get('posts',[PostController::class , 'index']);
    // Route::get('posts/store',[PostController::class , 'store']);
    // Route::get('posts/update',[PostController::class , 'update']);
    // Route::get('posts/destroy',[PostController::class , 'destroy']);


    //    Route::get('test', function () {


    //     Session::put('login','you are logged in!');

    //     //Session::forget('login');

    //    // Session::flush();


    //     if(Session::has('login')){
    //         return 'session set';
    //     }else{
    //         return 'not set';
    //     }

    //    });

        Route::resource('posts',PostController::class);
        Route::get('posts/soft-delete/{id}',[PostController::class,'SoftDelete'])->name('posts.soft-delete');

        Route::get('get/posts',[PostController::class,'getPosts'])->name('get.posts');

        Route::get('test', function() {

            $post= Post::first();
            //     return $post->user;
             //  $user = User::first();
              // $post= Post::first();
              // return $user->roles()->attach($post);
               return $post->tags;
            //   $post= Post::first();
            //     return $post->user;
        });
