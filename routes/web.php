<?php
use App\Transaction;
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
Route::get('/home', function(){
 return view('welcome-main');
});

Route::get('/', 'HomeController@index');
Route::get('/privacy', 'HomeController@privacy');
Route::get('/coupon', 'HomeController@coupon');
Route::get('/terms', 'HomeController@terms');
Route::get('/contact', 'HomeController@contact');
Route::get('/about', 'HomeController@about');
Route::get('/faq', 'HomeController@faq');
Route::post('/contact_us', 'HomeController@contact_us');
Route::get('/blog/{url}','HomeController@blog_item');

Route::post('/568740130:AAEy4Pn6vbpdHxPUAI3dzGVn3szWYNKDjGY/webhook', 'CronController@telegramWebhook');
Route::get('/blockchain/callback', 'CronController@blockchainCallback');

Route::get('/coinbase/callback', 'CronController@coinbaseCallback');
Route::post('/coinbase/webhook', 'CronController@coinbaseWebhook');
//Route::get('/coinbase/webhook', 'CronController@coinbaseWebhook');
Route::get('/updatedb', function(){
  $tr = Transaction::where('status', 2)->get();
      foreach ($tr as $key => $val) {
          if($val->days < 7 && $val->amount == 15 ){
                  $val->amount = 10;
                  $val->status = 1;
              }
              $val->save();
          }
      

      

    return "Successful!";
});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

Route::get('user/activation/{token}', 'Auth\ActivationController@activateUser')->name('user.activate');
Route::get('/resend_activation', 'Auth\ActivationController@resendActivation')->middleware('auth');

//Route::get('/home', 'DashController@index');
Route::get('/dashboard', 'DashController@index');
Route::get('/messagebox', 'DashController@messagebox');
Route::get('/profile', 'DashController@show_profile');
Route::get('/profile2', 'DashController@show_profile2');
Route::get('/earnings', 'DashController@show_earnings');

Route::get('/referral', 'DashController@show_referred');
Route::get('/message/reply/{id?}', 'DashController@reply_message');
Route::get('/message/{id?}', 'DashController@show_message');
Route::get('/transaction_history', 'DashController@transaction_history');
Route::get('/affiliates', 'DashController@show_affiliates');
Route::post('/purchase_request', 'DashController@purchase_request');

Route::post('/investment-request', 'DashController@investment_request');

Route::post('/reset_password', 'DashController@change_password');

Route::post('/profile', 'DashController@save_profile');
Route::post('/profile2', 'DashController@save_profile2');
Route::post('/confirm_rc', 'DashController@confirm_receipt');
Route::post('/get_bonus', 'DashController@get_bonus');
Route::post('/merge_shares', 'DashController@merge_shares');
Route::post('/confirm_ph', 'DashController@confirm_provide_help');
Route::post('/reject_ph', 'DashController@reject_provide_help');
//Route::post('/complain_rc', 'DashController@complain_receipt');
Route::post('/send_message', 'DashController@send_message');
Route::post('/unsuspend_acct', 'DashController@unsuspend_acct');
Route::post('/withdraw/{id}', 'DashController@withdraw');
Route::post('/share_testimony', 'DashController@share_testimony');
//Route::post('/pin_activation', 'DashController@pin_activation');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/users', 'AdminController@show_users');
    Route::get('/admin/messagebox', 'AdminController@messagebox');
    Route::get('/admin/message/reply/{id?}', 'AdminController@reply_message');
    Route::get('/admin/message/{id?}', 'AdminController@show_message');
    Route::get('/admin/deleted', 'AdminController@show_deleted_users');
    Route::get('/admin/user/{id}/suspend', 'AdminController@suspend_user');
    Route::get('/admin/user/{id}/release', 'AdminController@release_user');
    Route::get('/admin/user/{id}', 'AdminController@get_user');
    Route::get('/admin/transactions', 'AdminController@show_transactions');
    Route::get('/admin/testimonies', 'AdminController@show_testimonies');
    Route::post('/admin/clear_shares', 'AdminController@clear_shares');
    Route::get('/admin/withdrawals', 'AdminController@show_withdrawals');
    Route::get('/admin/withdrawn', 'AdminController@show_withdrawn');
    //Route::get('/admin/admincoupon', 'AdminController@show_coupon');
    Route::get('/admin/admincoupon', function () {

    $coupons = DB::table('coupon');
    $codes = $coupons->paginate(8000);

    return view('admin/admincoupon', ['codes' => $codes, 'code_count'=>DB::table('coupon')->count()]);
});
    Route::resource('/admin/blog', 'BlogController');
    Route::post('/admin/image', 'AdminController@uploadImage');
    Route::post('/admin/confirm_investment', 'AdminController@confirm_investment');

    Route::post('/admin_settings', 'AdminController@save_settings');
    Route::post('/admin_save_user', 'AdminController@save_user');
    Route::post('/admin_edit_transaction', 'AdminController@edit_transaction');
    Route::get('/admin_user_affiliate/{id}', 'AdminController@user_affiliate');

    Route::post('/admin_save_testimony', 'AdminController@save_testimony');
    Route::post('/admin_delete_testimony', 'AdminController@delete_testimony');

    Route::post('/admin_transactions', 'AdminController@save_transactions');
    Route::delete('/admin_transaction/{id}', 'AdminController@delete_transaction');
    Route::post('/admin/send_message', 'AdminController@send_message');
    Route::post('/delete_user', 'AdminController@delete_user');
    Route::post('/permanent/delete_user', 'AdminController@permanent_delete_user');
    Route::post('/restore/delete_user', 'AdminController@restore_delete_user');

    Route::post('/admin_notify', 'AdminController@admin_notify');
    Route::post('/admin_profile/{id}', 'AdminController@admin_profile');
});

Route::get('/test-notification', 'HomeController@test_notification')->middleware('auth');
Route::get('/make-payment', 'PaymentController@make_payment')->middleware('auth');
Route::post('/process_payment', 'PaymentController@process_payment')->middleware('auth');
Route::get('/payment/callback', 'PaymentController2@handleGatewayCallback')->middleware('auth');
Route::post('/pay', [
    'uses' => 'PaymentController2@redirectToGateway',
    'as' => 'pay'
])->middleware('auth');
Route::get('/wealthy/cron/job', 'CronController@check_transactions');
Route::get('/run_script', 'CronController@run_script');
//Route::get('/wealthy/reset/accounts', 'CronController@reset_accounts');

Route::get('/populate', 'populator@index');
Route::get('/manual/login/{id}', 'populator@loginAs');
