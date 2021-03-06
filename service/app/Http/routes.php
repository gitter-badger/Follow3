<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;

$app->post('auth/register', 'AuthController@register');
$app->post('auth/login', 'AuthController@login');
$app->get('auth/refresh/{refresh_token}', 'AuthController@refresh_access_token');
$app->get('auth/activate/{register_token}', 'AuthController@activate');
$app->patch('auth/reset', 'AuthController@reset_password');
$app->patch('auth/reset/{reset_token}', 'AuthController@confirm_reset_password');

$app->get('user/profile/{user_id}', 'UserController@profile');
$app->patch('user/notify', 'UserController@notify');

$app->get('user/follow', 'UserController@follow_list');
$app->get('user/follow/online', 'UserController@online_list');
$app->get('user/follow/all', 'UserController@follow_list');
$app->post('user/follow/{star_id}', 'UserController@follow_star');
$app->delete('user/follow/{star_id}', 'UserController@unfollow_star');

$app->post('star/search', 'StarController@search');
$app->post('star/add', 'StarController@add');
$app->get('star/hot/{page}', 'StarController@hot');
$app->get('star/online/{page}', 'StarController@online');

$app->get('/version', function () {
    return '0.1.0';
});

$app->get('test', function () {
    return -1;
});

$app->get('/phpinfo', function () {
    return phpinfo();
});
