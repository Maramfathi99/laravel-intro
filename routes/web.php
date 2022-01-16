<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\BlogController;
use  App\Http\Controllers\ContactController;
use  App\Http\Controllers\StudentController;
use  App\Http\Controllers\EmployeeController;
use  App\Http\Controllers\EmployeeModelController;
use  App\Http\Controllers\SessionCookieController;
use App\Http\Controllers\SendToViewController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', function () {
    return view('index');
});

Route::get('blog',[BlogController::class,'index']);
Route::get("blog/about",[BlogController::class,'about'])->name('blog-about');
Route::get("blog/store",[BlogController::class,'store'])->name('blog-store');
Route::get("blog/{id}",[BlogController::class,'products'])->name('blog-products');

Route::middleware(['auth'])->group(function () {

        Route::get("send-to-view",[SendToViewController::class,'index']);
        Route::get("send-to-view/with",[SendToViewController::class,'usingWith']);
        Route::get("send-to-view/with-name",[SendToViewController::class,'usingWithName']);
        Route::get("send-to-view/compact",[SendToViewController::class,'usingCompact']);

        Route::Resource("students",StudentController::class);
        Route::Resource("employess",EmployeeController::class);
        Route::get("employess/{id}/delete",[EmployeeController::class,'destroy'])->name("employess.delete");


        //لو بدي اعمل راوتر لصفحة السيرش بيجنغ لحال
        //Route::get("employess-model/search-paging",[EmployeeModelController::class,'searchPaging'])->name("employess-search-paging");
        Route::get("employess-model/search-paging-advanced",[EmployeeModelController::class,'searchPagingAdvanced'])->name("employess-search-paging-advanced");

        Route::Resource("employess-model",EmployeeModelController::class);
        Route::get("employess-model/{id}/delete",[EmployeeModelController::class,'destroy'])->name("employess-model.delete");

        Route::get("session/login",[SessionCookieController::class,'sessionLogin'])->name("session-login");
        Route::post("session/login",[SessionCookieController::class,'sessionPostLogin'])->name("session-post-login");
        Route::get("session/signout",[SessionCookieController::class,'sessionSignout'])->name("session-signout");
        Route::get("session/secure",[SessionCookieController::class,'sessionSecurePage'])->name("session-secure");



        Route::get("cookies/login",[SessionCookieController::class,'cookiesLogin'])->name("cookies-login");
        Route::post("cookies/login",[SessionCookieController::class,'cookiesPostLogin'])->name("cookies-post-login");
        Route::get("cookies/signout",[SessionCookieController::class,'cookiesSignout'])->name("cookies-signout");
        Route::get("cookies/secure",[SessionCookieController::class,'cookiesSecurePage'])->name("cookies-secure");

        Route::get("upload-file",[UploadFileController::class,'uploadFile'])->name('upload-file');
        Route::post("upload-file",[UploadFileController::class,'postUploadFile'])->name('post-upload-file');
        Route::get("download-private",[UploadFileController::class,'getSecureFile'])->name('download-private');

        
    Route::get("change-password",[ChangePasswordController::class,'changePassword'])->name('change-password');
    Route::post("change-password",[ChangePasswordController::class,'postChangePassword'])->name('post-change-password');
   
         
    Route::get("profile",[ProfileController::class,'editProfile'])->name('profile-edit');
    Route::put("profile",[ProfileController::class,'updateProfile'])->name('Profile-update');
     
    Route::resource("users",UsersController::class);
    //راوت لزر الديليت
    Route::get("users/{id}/delete",[UsersController::class,'destroy'])->name("users.delete");

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
