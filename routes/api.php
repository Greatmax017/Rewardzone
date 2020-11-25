<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', 'ApiController@get_user');
Route::get('/transactions', 'ApiController@get_transactions');
Route::get('/active_shares', 'ApiController@get_active_shares');
Route::get('/withdrawals', 'ApiController@get_withdrawal_requests');
Route::get('/referred', 'ApiController@get_referred');
Route::get('/messages', 'ApiController@get_messages');
Route::post('/message/{id}', 'ApiController@set_message_read');
Route::get('/overview', 'ApiController@overview');
Route::get('/affiliates', 'ApiController@get_affiliates');
Route::get('/news', 'ApiController@get_news');
Route::post('/purchase', 'ApiController@purchase_request');
Route::post('/withdrawal', 'ApiController@withdrawal_request');
Route::post('/support', 'ApiController@send_message');
