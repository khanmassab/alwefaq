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

// Route::get('marriage-request', 'MarriageRequestController@addMarriageRequest')->name('create-marriage-request');
// Route::post('marriage-request', 'MarriageRequestController@store')->name('marriage.store');
// Route::get('partner-request', 'MarriageRequestController@addPartnerRequest')->name('create-partner-request');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('verify/{token}', 'Auth\RegisterController@verifyEmail');
Route::get('resendVerify/{token}', 'Auth\LoginController@resendVerify');
Route::get('resendVerify2/{id}', 'Auth\LoginController@resendVerify2');

Route::group(['namespace' => 'Frontend','middleware' => ['auth']], function () {

    // home route
    /*
    Route::get('/', function (){
        return view('frontend.index');
    })->name('home');
    */
    // Jobs
    Route::resource('jobs-center', 'JobController');
    Route::get('jobs-center/job/{id}', 'JobController@show');

    // JobApplications
    Route::resource('job-applications', 'JobApplicationController');

    // volunteers
    Route::resource('volunteers-center', 'VolunteerController');
    Route::get('volunteers-center/volunteer/{id}', 'VolunteerController@show');

    // VolunteerApplications
    Route::resource('volunteer-applications', 'VolunteerApplicationController');

    Route::resource('marriageRequest', 'MarriageRequestController');

    Route::any('marriage-request/delete/{id}', 'MarriageRequestController@delete');

    Route::get('marriage-request/edit/{id}', 'MarriageRequestController@editMarriage');
    Route::put('marriage-request/edit/{id}', 'MarriageRequestController@updateMarriage')->name('marriage.update');

    Route::get('partner-request/edit/{id}', 'MarriageRequestController@editPartner')->name('partner.edit');
    Route::put('partner-request/edit/{id}', 'MarriageRequestController@updatePartner')->name('partner.update');


    Route::get('my-requests', 'MarriageRequestController@index')->name('my-requests');
    Route::get('suggested', 'MarriageRequestController@suggestedPartner')->name('suggested-partner');
    Route::get('marriage-request', 'MarriageRequestController@addMarriageRequest')->name('create-marriage-request');
    Route::post('marriage-request', 'MarriageRequestController@store')->name('marriage.store');
    Route::get('partner-request', 'MarriageRequestController@addPartnerRequest')->name('create-partner-request');
    Route::post('partner-request', 'MarriageRequestController@storePartner')->name('partner.store');


    Route::resource('matchRequest', 'MatchRequestController');
    Route::resource('mismatchRequest', 'MismatchRequestController');

    // HelpRequests
//    Route::resource('help-requests-items', 'HelpRequestController');
    Route::get('help-requests', 'HelpRequestController@index')->name('help');
    Route::get('my-help-requests', 'HelpRequestController@requests')->name('help-requests');
    Route::get('help-requests/create', 'HelpRequestController@create');
    Route::get('help-requests/create-item', 'HelpRequestController@createWithItems');
    Route::post('help-requests', 'HelpRequestController@store')->name('help.store');
    Route::post('help-item-requests', 'HelpRequestController@store')->name('help-item.store');
    Route::post('help-requests/destroy', ['as' => 'helpRequest.destroy', 'uses' => 'HelpRequestController@destroy']);

    // Sadakat
    Route::resource('sadkat', 'SadakatController');

    // Ashom
    Route::resource('ashm', 'AshomController');


    Route::resource('order', 'OrderController');


    Route::get('shop', 'CartController@shop')->name('shop');


    Route::get('checkout', 'CartController@checkout')->name('checkout');
    Route::post('payment', 'CartController@payment')->name('payment');
    Route::get('success', 'CartController@success')->name('payment-success');

    // Cart
    Route::resource('cart', 'CartController');
    Route::get('getTotalPrice', 'CartController@getTotalPrice');
    Route::post('cart/delete','CartController@destroy')->name('cart.destroy');



    // Pages

    Route::get('profile', 'UserController@profile')->name('profile');
    Route::post('profile', 'UserController@updateProfile')->name('updateProfile');
    Route::get('change-password', 'UserController@changePassword')->name('changePassword');
    Route::post('updatePassword', 'UserController@updatePassword')->name('updatePassword');


});

Route::group(['namespace' => 'Auth', 'middleware' => ['guestAuth']], function () {
    Route::get('register', 'RegisterController@register')->name('register');
    Route::post('register', 'RegisterController@storeUser')->name('register');
    Route::get('login', 'LoginController@login')->name('login');
    Route::post('login', 'LoginController@authenticate');
    Route::get('forget-password', 'ForgotPasswordController@getEmail')->name('forget');
    Route::post('forget-password', 'ForgotPasswordController@postEmail');
    Route::get('activate', 'ActivateController@activate')->name('activate');
    Route::post('activate', 'ActivateController@activateAccount');
    Route::get('reset-password/{token}', 'ResetPasswordController@getPassword');
    Route::post('reset-password', 'ResetPasswordController@updatePassword');

});





    Route::get('page/{slug}', 'Frontend\PageController@index')->name('page');


    Route::get('administratives', 'Frontend\AdministrativeController@index')->name('administrative');

    Route::get('search', 'Frontend\HomeController@search')->name('search');

    Route::get('contact-us', 'Frontend\ContactUsController@index')->name('contactUs');
    Route::post('contact-us', 'Frontend\ContactUsController@store')->name('sendContact');

    // Reports
    Route::get('report', 'Frontend\ReportController@index')->name('report');
    Route::post('report', 'Frontend\ReportController@store')->name('sendReport');
    // News
    Route::resource('news-center', 'Frontend\NewsController');
    Route::get('news-center/news/{categoryId}', 'Frontend\NewsController@categoryIndex');
    Route::get('news-center/news/{id}/{name}', 'Frontend\NewsController@showSingleNews');

    // Services
    Route::resource('services-center', 'Frontend\ServiceController');
    Route::get('services-center/service/{id}', 'Frontend\ServiceController@show');

    // Systems
    Route::resource('systems-center', 'Frontend\SystemController');
    Route::get('systems-center/system/{id}', 'Frontend\SystemController@show');

    // Initiatives
    Route::resource('initiatives-center', 'Frontend\InitiativeController');
    Route::get('initiatives-center/initiative/{id}', 'Frontend\InitiativeController@show');

    // Programs
    Route::resource('programs-center', 'Frontend\ProgramController');
    Route::get('programs-center/program/{id}', 'Frontend\ProgramController@show');

    // NewsCategories
    Route::resource('news-categories', 'Frontend\NewsCategoryController');

    // Partners
    Route::resource('our-partners', 'Frontend\PartnerController');


    // Albums
    Route::resource('media-albums', 'Frontend\AlbumController');
    Route::get('media-albums/images/{albumId}', 'Frontend\AlbumController@albumImages');

    // Videos
    Route::resource('media-videos', 'Frontend\VideoController');
    Route::get('media-videos/videos/{id}/{name}', 'Frontend\VideoController@showSingleVideo');
//    Route::get('news-center/news', 'Frontend\NewsController@categoryIndex');

Route::get('/', 'Frontend\HomeController@index')->name('home');
