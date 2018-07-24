<?php

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


/* 首页 */
Route::get('/', 'IndexController@index')->name('index');
/* 文章列表 */
Route::get('/archives', 'ArchivesController@index')->name('archives');
/* 查看文章 */
Route::get('/article', 'ArchivesController@article')->name('article');
/* 按分类查看文章 */
Route::get('/folder-article/{id}', 'ArchivesController@folderArticle')->name('folder-article');
/* 关于我 */
Route::get('/about-me', 'BasicController@aboutme')->name('about-me');
/* IT学习资料 */
Route::get('/it-resource', 'BasicController@itResource')->name('it-resource');
/* 留言 */
Route::post('/message/{id}', 'ArchivesController@message')->name('message');

/* 管理员路由 */
Route::Group(['middleware'=>'auth'],function() {
    Route::get('/admin', 'AdminController@index')->name('admin');
    /* 写，编辑，保存，发布文章 */
    Route::any('/article-edit/{id?}', 'ArchivesController@articleEdit')->name('article-edit');
    /* 删除文章 */
    Route::get('/article-delete/{id}', 'ArchivesController@articleDelete')->name('article-delete');
    /* 图片上传 */
    Route::post('/upload-img', 'BasicController@uploadImg')->name('upload-img');
    /* 真实的我 */
    Route::get('wall', 'BasicController@wall')->name('wall');
    /* 设置首页显示 */
    Route::get('/show-home/{id}', 'ArchivesController@showHome')->name('show-home');
    /* 取消首页显示 */
    Route::get('/hide-home/{id}', 'ArchivesController@hideHome')->name('hide-home');
    /* 文章分类管理 */
    Route::any('/folder/{id?}', 'BasicController@folderIndex')->name('folder');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
