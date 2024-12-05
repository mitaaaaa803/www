<?php

use Illuminate\Support\Facades\Route;

// 加入WelcomeController
use App\Http\Controllers\WelcomeController;

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



// Route::get('路由', '方法');
Route::controller(WelcomeController::class)->group(function(){
    // 首頁
    Route::get('/', 'index'); 

    // 查看文章
    Route::get('/view/{id}', 'ViewComment')->name('view');// 加入->name('view')
    Route::post('/view/{id}', 'ViewCommentSave'); 

    // 回復文章
    Route::get('/reply/{id}', 'ReplyComment');
    Route::post('/reply/{id}', 'ReplyCommentSave'); 

    // 新增文章
    Route::get('/new', 'AddComment'); 
    Route::post('/new/{id}', 'AddCommentSave');

    // 修改文章
    Route::get('/edit', 'EditComment');
    Route::post('/edit', 'EditCommentSave'); 

    // 刪除文章
    Route::get('/delete/{id}', 'DeleteComment'); 

    // 會員註冊
    Route::get('/member', 'MemberComment');
    Route::post('/member', 'MemberCommentSave'); 

    // 會員修改
    Route::get('/editMember/{id}', 'EditMemberComment');
    Route::post('/editMember/{id}', 'EditMemberCommentSave'); 

    //登入
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'Login'); 

    //登出
    Route::get('/logout', 'logout')->name('logout'); 
});


