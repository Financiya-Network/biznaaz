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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'HomesController@index');
Route::get('/index1', 'HomesController@index1');
Route::get('/become-seller', 'HomesController@index2');
Route::get('/maintenance', 'HomesController@maintenance');
Route::get('/job', 'HomesController@job');
//Route::get('/', 'HomesController@home');
Route::get('/lang/{lang}', 'LanguageController@lang');
Route::any('/login', 'UsersController@login');
Route::any('/logout', 'UsersController@logout');
Route::any('/register', 'UsersController@register');
Route::get('/email-confirmation/{ukey}', 'UsersController@emailConfirmation');
Route::any('/forgot-password', 'UsersController@forgotPassword');
Route::any('/reset-password/{ukey}', 'UsersController@resetPassword');
Route::any('/users/dashboard', 'UsersController@dashboard');
Route::get('/users/redirecttogoogle', 'UsersController@redirectToGoogle');
Route::get('/users/handlegooglecallback', 'UsersController@handleGoogleCallback');
Route::get('/users/redirecttofacebook', 'UsersController@redirectToFacebook');
Route::get('/users/handlefacebookcallback', 'UsersController@handleFacebookCallback');
Route::get('/users/redirecttolinkedin', 'UsersController@redirectToLinkedin');
Route::get('/users/handlelinkedincallback', 'UsersController@handleLinkedinCallback');
Route::get('/users/sociallogin', 'UsersController@sociallogin');
Route::post('/users/uplgetkeyword1oadprofileimage', 'UsersController@uploadprofileimage');
Route::post('/users/updatedata', 'UsersController@updatedata');
Route::get('/users/settings', 'UsersController@settings');
Route::post('/users/updatesettings', 'UsersController@updatesettings');
Route::get('/users/notifications', 'UsersController@notifications');
Route::get('/users/delete-notification/{slug}', 'UsersController@deletenotification');
Route::get('/users/view-notification/{slug}', 'UsersController@viewnotification');

Route::any('/users/chklogin', 'UsersController@chklogin');

Route::any('/gigs/offeredgig', 'GigsController@offeredgig');
Route::any('/gigs/myofferedgig', 'GigsController@myofferedgig');
Route::any('/gigs/add', 'GigsController@add');
Route::any('/gigs/management', 'GigsController@management');
Route::any('/gigs/create', 'GigsController@create');
Route::get('/gigs/getsubcategorylist/{id}', 'GigsController@getsubcategorylist');
Route::any('/gigs/edit/{slug}', 'GigsController@edit');
Route::any('/gigs/uploaddocument', 'GigsController@uploaddocument');
Route::any('/gigs/uploaddoc', 'GigsController@uploaddoc');
Route::any('/gigs/delete/{slug}', 'GigsController@delete');
Route::any('/gigs/deleteimage/{id}', 'GigsController@deleteimage');

Route::any('/gigs/getkeyword', 'GigsController@getkeyword');


Route::any('/gigs/addwaitlist', 'GigsController@addwaitlist');

Route::any('/gigs/createoffer', 'GigsController@createoffer');
Route::any('/acceptreject/{type}/{slug}', 'GigsController@acceptreject');
Route::any('/gigs', 'GigsController@listing');
Route::any('/gigs/{catslug}', 'GigsController@listing');
Route::any('/gigs/{catslug}/{subcatslug}', 'GigsController@listing');
Route::get('/gig-details/{slug}', 'GigsController@detail');
Route::get('/orders', 'PagesController@orders');

Route::get('/services/management', 'ServicesController@management');
Route::any('/services/create-request', 'ServicesController@create');
Route::any('/services/edit-request/{slug}', 'ServicesController@editrequest');
Route::any('/services/delete-request/{slug}', 'ServicesController@deleterequest');
Route::get('/services/updatesubcategory/{catid}', 'ServicesController@updatesubcategory');

Route::any('/earnings', 'WalletsController@earnings');
Route::post('/wallets/withdraw-request', 'WalletsController@withdrawrequest');

Route::get('/buyer-requests/{slug}', 'ServicesController@detail');
Route::any('/buyer-requests', 'ServicesController@buyerrequest');
Route::get('/buyer-requests-view-offers/{slug}', 'ServicesController@buyerrequestviewoffers');
Route::any('/services/acceptrejectoffers/{type}/{slug}', 'ServicesController@acceptrejectoffers');
Route::any('/services/acceptandpay/{slug}', 'PaymentsController@acceptandpay');
Route::post('/send-request-offer', 'ServicesController@sendrequestoffer');
Route::any('/services/workplace/{slug}', 'ServicesController@workplace');
Route::get('/services/markcompleted/{slug}', 'ServicesController@markcompleted');
Route::any('/services/offers-sent', 'ServicesController@offerssent');

Route::any('/payments/successpaypal/{slug}', 'PaymentsController@successpaypal');
Route::any('/payments/cancel/{slug}', 'PaymentsController@cancel');
Route::any('/payments/notify/{slug}', 'PaymentsController@notify');

Route::any('/payments/addtocart', 'PaymentsController@addtocart');
Route::any('/order-summary/{slug}', 'PaymentsController@ordersummary');

Route::any('/payments/paywithpaypal/{slug}', 'PaymentsController@paywithpaypal');
Route::any('/payments/success/{slug}', 'PaymentsController@success');
Route::any('/payments/paypalcancel/{slug}', 'PaymentsController@paypalcancel');

Route::any('/payments/paywithpaypalservice/{slug}', 'PaymentsController@paywithpaypalservice');
Route::any('/payments/successservice/{slug}', 'PaymentsController@successservice');
Route::any('/payments/paypalcancelservice/{slug}', 'PaymentsController@paypalcancelservice');

Route::any('/payments/paywithcard', 'PaymentsController@paywithcard');
Route::any('/payments/payviawallet', 'PaymentsController@payviawallet');
Route::any('/payments/history', 'PaymentsController@history');
Route::any('/payments/paywithcardservice', 'PaymentsController@paywithcardservice');
Route::any('/payments/payviawalletservice', 'PaymentsController@payviawalletservice');

Route::any('/buying-orders', 'MyordersController@buyingorders');
Route::any('/myorders/markascompleted/{slug}', 'MyordersController@markascompleted');
Route::any('/myorders/rateseller/{slug}', 'MyordersController@rateseller');
Route::any('/myorders/ratebuyer/{slug}', 'MyordersController@ratebuyer');
Route::any('/myorders/workplace/{slug}', 'MyordersController@workplace');
Route::get('/myorders/download/{slug}/{filename}', 'MyordersController@download');
Route::get('/messages/download/{slug}/{filename}', 'MessagesController@download');

Route::any('/selling-orders', 'MyordersController@sellingorders');

Route::get('/buyer-contacts', 'UsersController@buyercontacts');
Route::get('/seller-contacts', 'UsersController@sellercontacts');
Route::get('/public-profile/{slug}', 'UsersController@publicprofile');

Route::any('/users/messageuser', 'UsersController@messageuser');
Route::any('/messages/message/{slug}', 'MessagesController@message');
Route::any('/messages/message', 'MessagesController@message');
Route::post('/users/likeunlike', 'UsersController@likeunlike');
Route::post('/users/deletelikeunlike', 'UsersController@deletelikeunlike');
Route::get('/my-saved-gigs', 'UsersController@mysavedgig');

Route::get('/faqs', 'PagesController@index');
Route::get('/how-it-works', 'PagesController@index');
Route::get('/privacy-policy', 'PagesController@index');
Route::get('/terms-and-condition', 'PagesController@index');
Route::get('/press-and-news', 'PagesController@index');
Route::get('/trust-and-safety', 'PagesController@index');
Route::get('/about-us', 'PagesController@index');
Route::any('/contact-us', 'PagesController@contactus');

Route::any('/updatedata', 'HomesController@updatedata');
Route::any('/categories', 'HomesController@categories');
Route::get('/check-new-notification', 'UsersController@checknotifications');

Route::any('/pages/checlapi', 'PagesController@checlapi');

#Route::get('/sendemail', 'HomesController@sendmail');
Route::group(['prefix' => 'admin','namespace'=>'Admin'], function()
{
    Route::any('/', 'AdminsController@login');
    Route::any('login', 'AdminsController@login');
    Route::any('admins/login', 'AdminsController@login');
    Route::get('admins/logout', 'AdminsController@logout');
    Route::get('admins/dashboard', 'AdminsController@dashboard');
    Route::get('admins/userchart/{daycount}', 'AdminsController@userchart');
    Route::any('admins/change-username', 'AdminsController@changeUsername');
    Route::any('admins/change-password', 'AdminsController@changePassword');
    Route::any('admins/change-email', 'AdminsController@changeEmail');
    Route::any('admins/forgot-password', 'AdminsController@forgotPassword');
    Route::any('admins/site-settings', 'AdminsController@siteSettings');
    
    Route::any('/banners', 'BannersController@index');    
    Route::any('/banners/edit/{slug}', 'BannersController@edit');
    Route::get('/banners/delete/{slug}', 'BannersController@delete');
    Route::any('/banners/add', 'BannersController@add');
    Route::any('/users', 'UsersController@index');
    Route::any('/users/add', 'UsersController@add');    
    Route::any('/users/edit/{slug}', 'UsersController@edit');
    Route::get('/users/activate/{slug}', 'UsersController@activate');
    Route::get('/users/deactivate/{slug}', 'UsersController@deactivate');
    Route::get('/users/delete/{slug}', 'UsersController@delete');
    Route::get('/users/deleteimage/{slug}', 'UsersController@deleteimage');
    
    Route::any('/countries', 'CountriesController@index');
    Route::any('/countries/add', 'CountriesController@add');    
    Route::any('/countries/edit/{slug}', 'CountriesController@edit');
    Route::get('/countries/activate/{slug}', 'CountriesController@activate');
    Route::get('/countries/deactivate/{slug}', 'CountriesController@deactivate');
    Route::get('/countries/delete/{slug}', 'CountriesController@delete');
    
    Route::any('/categories', 'CategoriesController@index');
    Route::any('/categories/add', 'CategoriesController@add');    
    Route::any('/categories/edit/{slug}', 'CategoriesController@edit');
    Route::get('/categories/activate/{slug}', 'CategoriesController@activate');
    Route::get('/categories/deactivate/{slug}', 'CategoriesController@deactivate');
    Route::get('/categories/delete/{slug}', 'CategoriesController@delete');
    
    Route::any('/categories/subcategory/{cslug}', 'CategoriesController@subcategory');
    Route::any('/categories/addsubcategory/{cslug}', 'CategoriesController@addsubcategory');    
    Route::any('/categories/editsubcategory/{cslug}/{slug}', 'CategoriesController@editsubcategory');
    Route::get('/categories/activatesubcategory/{cslug}/{slug}', 'CategoriesController@activatesubcategory');
    Route::get('/categories/deactivatesubcategory/{cslug}/{slug}', 'CategoriesController@deactivatesubcategory');
    Route::get('/categories/deletesubcategory/{cslug}/{slug}', 'CategoriesController@deletesubcategory');
    
    Route::any('/skills', 'SkillsController@index');
    Route::any('/skills/add', 'SkillsController@add');    
    Route::any('/skills/edit/{slug}', 'SkillsController@edit');
    Route::get('/skills/activate/{slug}', 'SkillsController@activate');
    Route::get('/skills/deactivate/{slug}', 'SkillsController@deactivate');
    Route::get('/skills/delete/{slug}', 'SkillsController@delete');
    
    Route::any('/qualifications', 'QualificationsController@index');
    Route::any('/qualifications/add', 'QualificationsController@add');    
    Route::any('/qualifications/edit/{slug}', 'QualificationsController@edit');
    Route::get('/qualifications/activate/{slug}', 'QualificationsController@activate');
    Route::get('/qualifications/deactivate/{slug}', 'QualificationsController@deactivate');
    Route::get('/qualifications/delete/{slug}', 'QualificationsController@delete');
    
    Route::any('/testimonials', 'TestimonialsController@index');
    Route::any('/testimonials/add', 'TestimonialsController@add');    
    Route::any('/testimonials/edit/{slug}', 'TestimonialsController@edit');
    Route::get('/testimonials/activate/{slug}', 'TestimonialsController@activate');
    Route::get('/testimonials/deactivate/{slug}', 'TestimonialsController@deactivate');
    Route::get('/testimonials/delete/{slug}', 'TestimonialsController@delete');
    
    Route::any('/pages', 'PagesController@index');  
    Route::any('/pages/edit/{slug}', 'PagesController@edit');
    Route::any('/pages/pageimages', 'PagesController@pageimages');
    
    Route::any('/wallets', 'WalletsController@index');
    Route::any('/wallets/history/{slug}', 'WalletsController@history');
    Route::get('/wallets/approve-reject/{type}/{slug}', 'WalletsController@approvereject');
    
    Route::any('/vieworders', 'ViewordersController@index');
    
    Route::any('/gigs', 'GigsController@index');
    Route::any('/gigs/add', 'GigsController@add');    
    Route::any('/gigs/edit/{slug}', 'GigsController@edit');
    Route::get('/gigs/activate/{slug}', 'GigsController@activate');
    Route::get('/gigs/deactivate/{slug}', 'GigsController@deactivate');
    Route::get('/gigs/delete/{slug}', 'GigsController@delete');
    
    Route::any('/services', 'ServicesController@index');
    Route::any('/services/add', 'ServicesController@add');    
    Route::any('/services/edit/{slug}', 'ServicesController@edit');
    Route::get('/services/activate/{slug}', 'ServicesController@activate');
    Route::get('/services/deactivate/{slug}', 'ServicesController@deactivate');
    Route::get('/services/delete/{slug}', 'ServicesController@delete');
    
    Route::any('/paypal-payment-histories', 'PaymentsController@index');
    
   
   
});