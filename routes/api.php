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

Route::post('/users/login', 'Api\UsersController@login');
Route::post('/users/forgotPassword', 'Api\UsersController@forgotPassword');
Route::post('/users/register', 'Api\UsersController@register');


Route::get('/users/dashboard', 'Api\UsersController@dashboard');
Route::post('/users/changepassword', 'Api\UsersController@changepassword');
Route::post('/users/setpaypalemail', 'Api\UsersController@setpaypalemail');
Route::get('/users/getcountrylist', 'Api\UsersController@getcountrylist');
Route::get('/users/getprofile', 'Api\UsersController@getprofile');
Route::post('/users/editprofile', 'Api\UsersController@editprofile');
Route::post('/users/changepicture', 'Api\UsersController@changepicture');
Route::get('/users/getcategorylist', 'Api\UsersController@getcategorylist');
Route::post('/users/getsubcategorylist', 'Api\UsersController@getsubcategorylist');
Route::get('/users/getskilllist', 'Api\UsersController@getskilllist');
Route::get('/users/getlanguagelist', 'Api\UsersController@getlanguagelist');
Route::get('/users/gettopgigs', 'Api\UsersController@gettopgigs');
Route::any('/users/gigdetail', 'Api\UsersController@gigdetail');
Route::any('/users/getgigslisting', 'Api\UsersController@getgigslisting');
Route::any('/users/gigslisting', 'Api\UsersController@gigslisting');
Route::any('/users/gethomedetail', 'Api\UsersController@gethomedetail');
Route::any('/users/liked', 'Api\UsersController@liked');
Route::any('/users/delete', 'Api\UsersController@delete');
Route::any('/users/deleteaccount', 'Api\UsersController@deleteaccount');
Route::any('/users/getsavedgigs', 'Api\UsersController@getsavedgigs');
Route::post('/users/contactus', 'Api\UsersController@contactus');
Route::any('/users/buyercontact', 'Api\UsersController@buyercontact');
Route::any('/users/sellercontact', 'Api\UsersController@sellercontact');
Route::any('/users/viewprofile', 'Api\UsersController@viewprofile');
Route::any('/users/getnotification', 'Api\UsersController@getnotification');
Route::any('/users/getbuyercontacts', 'Api\UsersController@getbuyercontacts');
Route::any('/users/getsellercontacts', 'Api\UsersController@getsellercontacts');
Route::any('/users/getofferedgig', 'Api\UsersController@getofferedgig');
Route::any('/users/getmyofferedgig', 'Api\UsersController@getmyofferedgig');
Route::any('/users/getconversation', 'Api\UsersController@getconversation');
Route::any('/users/sendmessage', 'Api\UsersController@sendmessage');
Route::any('/users/createoffer', 'Api\UsersController@createoffer');
Route::any('/users/acceptreject', 'Api\UsersController@acceptreject');
Route::any('/users/sendNonceToServer', 'Api\UsersController@sendNonceToServer');
Route::any('/users/markasordercompleted', 'Api\UsersController@markasordercompleted');
Route::any('/users/withdrawrequest', 'Api\UsersController@withdrawrequest');
Route::any('/users/addmoney', 'Api\UsersController@addmoney');

Route::get('/users/getbannerlist', 'Api\UsersController@getbannerlist');

Route::get('/users/getbalance', 'Api\UsersController@getbalance');
Route::get('/myorders/sellingorders', 'Api\MyordersController@sellingorders');
Route::get('/myorders/buyingorders', 'Api\MyordersController@buyingorders');
Route::any('/myorders/earnings', 'Api\MyordersController@earnings');
Route::any('/myorders/paymenthistory', 'Api\MyordersController@paymenthistory');
Route::any('/myorders/orderdetail', 'Api\MyordersController@orderdetail');
Route::any('/myorders/rateandreview', 'Api\MyordersController@rateandreview');

Route::any('/services/create', 'Api\ServicesController@create');
Route::any('/services/edit', 'Api\ServicesController@edit');
Route::any('/services/delete', 'Api\ServicesController@delete');
Route::any('/services/listing', 'Api\ServicesController@listing');
Route::any('/services/detail', 'Api\ServicesController@detail');
Route::any('/services/activelist', 'Api\ServicesController@activelist');
Route::any('/services/offersentlist', 'Api\ServicesController@offersentlist');
Route::any('/services/offersent', 'Api\ServicesController@offersent');
Route::any('/services/acceptrejectoffer', 'Api\ServicesController@acceptrejectoffer');
Route::any('/services/markcompleted', 'Api\ServicesController@markcompleted');
Route::any('/services/viewoffer', 'Api\ServicesController@viewoffer');
Route::any('/services/workplace', 'Api\ServicesController@workplace');
Route::any('/services/sendmessage', 'Api\ServicesController@sendmessage');
Route::any('/services/messagelist', 'Api\ServicesController@messagelist');


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
