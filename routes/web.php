<?php

Route::get('/', function () {
    return view('pages.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login','Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dash');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/home/logout','Auth\LoginController@userLogout')->name('user.logout');
	Route::get('rapor/{id}','ReportController@showContent')->name('rapor.showcontent');
	Route::resource('/userpage','UserpageController');

	Route::post('/rapor/{id}','ReportController@loadReportContent')->name('load.report.content'); //This is loading content with Ajax Request
});

Route::group(['middleware' => ['admin']], function () {
	Route::get('/admin/logout','Auth\AdminLoginController@logout')->name('admin.logout');
	Route::resource('admin/kullaniciislemleri','UsersController');
	Route::resource('admin/raporislemleri','ReportController');
	Route::resource('admin/yetkigruplari','UserPermissionController');
	Route::resource('admin/kategori', 'MenuController');
	Route::put('admin/yetkigruplari/{id}/edit','UserPermissionController@updateTitle')->name('yetkigruplari.update.title');
	Route::resource('rapor/{reportId}/graph', 'GraphController');
	Route::get('test', function() {
	    dd (DB::connection('oracle1')->getPdo());
	});
});
