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
/* 关于我 */
Route::get('/about-me', 'ArticleController@index')->name('about-me');
/* IT学习资料 */
Route::get('/it-resource', 'ArticleController@index')->name('it-resource');

Route::get('/article-edit', 'ArchivesController@articleEdit')->name('article-edit');

/* 图片上传 */
Route::post('/upload-img', 'BasicController@uploadImg')->name('upload-img');

/* 管理员路由 */
Route::Group(['middleware'=>'auth'],function() {
    Route::get('/admin', 'AdminController@index')->name('admin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
