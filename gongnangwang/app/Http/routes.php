<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'IndexController@index');

//用户登录注册
Route::get('login', 'LoginController@login');
Route::any('logindo', 'LoginController@logindo');
Route::get('register', 'LoginController@register');
Route::any('register_do', 'LoginController@register_do');
Route::any('exit', 'LoginController@user_exit');
Route::any('mobile', 'LoginController@mobile');

//众筹
Route::get('chou', 'ChouController@chou');
Route::get('chouadd', 'ChouController@chouadd');
Route::any('busUpload', 'ChouController@busUpload');
Route::any('busUploadUpdate', 'ChouController@busUploadUpdate');
Route::any('teaUpload', 'ChouController@teaUpload');
Route::any('teaUploadUpdate', 'ChouController@teaUploadUpdate');
Route::any('roaUpload', 'ChouController@roaUpload');
Route::any('roaUploadUpdate', 'ChouController@roaUploadUpdate');
Route::get('chouedit/{pro_name}', 'ChouController@chouedit');
Route::any('choueditdo', 'ChouController@choueditdo');
Route::any('choudo', 'ChouController@choudo');
Route::any('business', 'ChouController@business');
Route::any('team', 'ChouController@team');
Route::any('roadshow', 'ChouController@roadshow');
Route::any('attachment', 'ChouController@attachment');
Route::get('chou_m', 'ChouController@chou_m');
Route::get('chou_m/{pro_name}', 'ChouController@chou_m');

//合伙人
Route::get('ren', 'RenController@ren');
Route::get('renadd', 'RenController@renadd');
Route::any('rendo', 'RenController@rendo');
Route::any('renUpload', 'RenController@renUpload');
Route::any('renedit_do', 'RenController@renedit_do');
Route::any('renUploadUpdate', 'RenController@renUploadUpdate');
Route::get('renedit', 'RenController@renedit');
Route::any('ren_m', 'RenController@ren_m');
Route::get('ren_m/{par_proname}/{par_id}', 'RenController@ren_m');
Route::get('ren_s', 'RenController@ren_s');
Route::get('ren_p', 'RenController@ren_p');
Route::get('pinadd', 'RenController@pinadd');
Route::any('pindo', 'RenController@pindo');
Route::any('position', 'RenController@position');
Route::get('position_page', 'RenController@position_page');
Route::get('position_delete', 'RenController@position_delete');
Route::any('position_edit', 'RenController@position_edit');
Route::any('position_edit_do', 'RenController@position_edit_do');

Route::any('comment', 'RenController@comment');

//活动
Route::get('dong', 'DongController@dong');
Route::get('dongadd', 'DongController@dongadd');
Route::any('dongdo', 'DongController@dongdo');
Route::get('dong_m', 'DongController@dong_m');

//拍卖
Route::get('pai_m', 'PaiController@pai_m');
Route::get('paiadd', 'PaiController@paiadd');
Route::any('paido', 'PaiController@paido');

//个人
Route::any('my', 'MyController@my');
Route::any('captcha/{tmp}', 'MyController@captcha');
Route::any('pass_update', 'MyController@pass_update');
Route::any('myVideoUpload', 'MyController@myVideoUpload');
Route::any('myVideoUpdate', 'MyController@myVideoUpdate');
Route::any('my{tab}', 'MyController@my');
Route::get('useradd', 'MyController@myadd');
Route::any('userdo', 'MyController@mydo');
Route::any('nicknameVerify', 'MyController@nicknameVerify');
Route::get('out', 'MyController@out');
Route::get('partner', 'MyController@partner');
Route::get('mydong', 'MyController@mydong');
Route::get('risk', 'MyController@risk');
Route::get('service', 'MyController@service');
Route::get('about{tab}', 'MyController@about');

Route::get('user', 'UserController@user');
Route::get('users/{name}', 'UserController@users');
Route::get('useredit', 'MyController@myedit');
Route::any('usereditdo', 'MyController@editdo');

//融资顾问
Route::get('rong', 'RongController@rong');
Route::get('rongadd', 'RongController@rongadd');

//ceshi
Route::get('redis', 'LoginController@redis');

//七牛
Route::get('uptoken', 'QiniuController@uptoken');
Route::get('pfop_status', 'QiniuController@pfop_status');
