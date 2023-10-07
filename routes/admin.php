<?php
/**
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:53 AM
 * Last Modified: 1/5/20, 12:14 AM
 * Project Name: Wafaq
 * File Name: admin.php
 */

Route::group(['prefix' => 'admin', 'namespace' => 'Auth'], function () {

    Route::get('/', 'AuthController@getLogin');
    Route::get('login', 'AuthController@getLogin')->name('admin.login');
    Route::post('login', 'AuthController@loginAdmin')->name('admin.login.post');

    Route::get('logout', 'AuthController@getLogout')->name('admin.auth.logout');

    Route::group(['prefix' => 'password'], function () {
        Route::get('remind', 'ResetPasswordController@forgotPassword')->name('admin.password.remind');
        Route::post('remind', 'ResetPasswordController@sendPasswordReminder')->name('admin.password.remind.post');
        Route::get('reset/{token}', 'ResetPasswordController@getReset')->name('admin.password.reset');
        Route::post('reset', 'ResetPasswordController@postReset')->name('admin.password.reset.post');
    });
});

/**
 * Clear Cache
 */
Route::get('/fix', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    \Artisan::call('config:clear');
    return redirect()->back();
})->name('fix');

// 'prefix' => 'admin' , namespace 'Backend', as default
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth:admin'], function () {

    Route::resource('/', 'DashboardController')->names('admin.dashboard');

    Route::resource('admins', 'AdminsController');
    Route::get('/getAdmins', 'AdminsController@getAdmins')->name('admins.getAdmins');
    Route::post('admins/destroy', ['as' => 'admins.destroy', 'uses' => 'AdminsController@destroy']);

    Route::resource('activityLog', 'ActivityLogController')->names('admin.activityLog');
    Route::get('/getActivityLog', 'ActivityLogController@getActivityLog')->name('activityLog.getActivityLog');



    /**
     * Roles & Permissions
     */
    Route::resource('role', 'RolesController');
    Route::post('permission/save', [
        'as' => 'permission.save',
        'uses' => 'PermissionsController@saveRolePermissions'
    ]);
    Route::resource('permission', 'PermissionsController');

    Route::resource('settings', 'SettingsController')->names('settings');
    Route::get('/destroy1', 'SettingsController@destroy1')->name('settings.destroy1');
    Route::get('/destroy2', 'SettingsController@destroy2')->name('settings.destroy2');

    Route::resource('contactus', 'ContactUsController');
    Route::get('/getContactus', 'ContactUsController@getContactus')->name('contactus.getContactus');
    Route::post('contactus/destroy', ['as' => 'contactus.destroy', 'uses' => 'ContactUsController@destroy']);


    Route::resource('reports', 'ReportController');
    Route::get('/getReports', 'ReportController@getReports')->name('reports.getReports');
    Route::post('reports/destroy', ['as' => 'reports.destroy', 'uses' => 'ReportController@destroy']);


    Route::resource('sliders', 'SliderController');
    Route::get('/getSliders', 'SliderController@getSliders')->name('sliders.getSliders');
    Route::post('sliders/destroy', ['as' => 'sliders.destroy', 'uses' => 'SliderController@destroy']);

    // Systems
    Route::resource('systems', 'SystemController');
    Route::get('/getSystems', 'SystemController@getSystems')->name('systems.getSystems');
    Route::post('systems/destroy', ['as' => 'systems.destroy', 'uses' => 'SystemController@destroy']);

    // Footer
    Route::resource('footers', 'FooterController');
    Route::get('/getFooters', 'FooterController@getFooters')->name('footers.getFooters');
    Route::post('footers/destroy', ['as' => 'footers.destroy', 'uses' => 'FooterController@destroy']);

    // Initiatives
    Route::resource('initiatives', 'InitiativeController');
    Route::get('/getInitiatives', 'InitiativeController@getInitiatives')->name('initiatives.getInitiatives');
    Route::post('initiatives/destroy', ['as' => 'initiatives.destroy', 'uses' => 'InitiativeController@destroy']);

    // Programs
    Route::resource('programs', 'ProgramController');
    Route::get('/getPrograms', 'ProgramController@getPrograms')->name('programs.getPrograms');
    Route::post('programs/destroy', ['as' => 'programs.destroy', 'uses' => 'ProgramController@destroy']);
    
    Route::resource('abouts', 'AboutController');
    Route::get('/getAbouts', 'AboutController@getAbouts')->name('abouts.getAbouts');
    Route::post('abouts/destroy', ['as' => 'abouts.destroy', 'uses' => 'AboutController@destroy']);

    // News
    Route::resource('news', 'NewsController');
    Route::get('/getNews', 'NewsController@getNews')->name('news.getNews');
    Route::post('news/destroy', ['as' => 'news.destroy', 'uses' => 'NewsController@destroy']);

    // News
    Route::resource('users', 'UserController');
    Route::get('/getUsers', 'UserController@getUsers')->name('users.getUsers');
    Route::post('users/destroy', ['as' => 'users.destroy', 'uses' => 'UserController@destroy']);

    // Services
    Route::resource('services', 'ServiceController');
    Route::get('/getServices', 'ServiceController@getServices')->name('services.getServices');
    Route::post('services/destroy', ['as' => 'services.destroy', 'uses' => 'ServiceController@destroy']);

    //newsCategories
    Route::resource('newsCategories', 'NewsCategoryController');
    Route::get('/getNewsCategories', 'NewsCategoryController@getNewscategories')->name('newsCategories.getNewsCategories');
    Route::post('newsCategories/destroy', ['as' => 'newsCategories.destroy', 'uses' => 'NewsCategoryController@destroy']);

    // albums
    Route::resource('albums', 'AlbumController');
    Route::get('/getAlbums', 'AlbumController@getAlbums')->name('albums.getAlbums');
    Route::post('albums/destroy', ['as' => 'albums.destroy', 'uses' => 'AlbumController@destroy']);

    // AlbumImage
    Route::get('albumImages/getAlbumImages/{id}', 'AlbumImageController@getAlbumImages')->name('albumImages.getAlbumImages');
    Route::post('albumImages/deleteImage', 'AlbumImageController@deleteImage')->name('albumImages.deleteImage');
    Route::post('albumImages/storeImage', 'AlbumImageController@storeImage')->name('albumImages.storeImage');

    // Videos
    Route::resource('videos', 'VideoController');
    Route::get('/getVideos', 'VideoController@getVideos')->name('videos.getVideos');
    Route::post('videos/destroy', ['as' => 'videos.destroy', 'uses' => 'VideoController@destroy']);

    // Items
    Route::resource('items', 'ItemController');
    Route::get('/getItems', 'ItemController@getItems')->name('items.getItems');
    Route::post('items/destroy', ['as' => 'items.destroy', 'uses' => 'ItemController@destroy']);

    // Partners
    Route::resource('partners', 'PartnerController');
    Route::get('/getPartners', 'PartnerController@getPartners')->name('partners.getPartners');
    Route::post('partners/destroy', ['as' => 'partners.destroy', 'uses' => 'PartnerController@destroy']);

    // HelpRequests
    Route::resource('helpRequests', 'HelpRequestController');
    Route::get('/getHelpRequests', 'HelpRequestController@getHelpRequests')->name('helpRequests.getHelpRequests');
    Route::post('helpRequests/destroy', ['as' => 'helpRequests.destroy', 'uses' => 'HelpRequestController@destroy']);

    // Orders
    Route::resource('orders', 'OrderController');
    Route::get('/getDatatable', 'OrderController@getDatatable')->name('orders.getDatatable');
    Route::post('orders/destroy', ['as' => 'orders.destroy', 'uses' => 'OrderController@destroy']);

    // MarriageRequests
    Route::resource('marriageRequests', 'MarriageRequestController');
    Route::get('getMarriageRequests', 'MarriageRequestController@getDatatable')->name('marriageRequests.getDatatable');
    Route::post('marriageRequests/destroy', ['as' => 'marriageRequests.destroy', 'uses' => 'MarriageRequestController@destroy']);

    // PartnerRequests
    Route::resource('partnerRequests', 'PartnerRequestController');
    Route::get('getPartnerRequests', 'PartnerRequestController@getDatatable')->name('partnerRequests.getDatatable');
    Route::post('partnerRequests/destroy', ['as' => 'partnerRequests.destroy', 'uses' => 'PartnerRequestController@destroy']);

    // MatchRequests
    Route::resource('matchRequests', 'MatchRequestController');
    Route::get('getMatchRequests', 'MatchRequestController@getDatatable')->name('matchRequests.getDatatable');
    Route::post('matchRequests/destroy', ['as' => 'matchRequests.destroy', 'uses' => 'MatchRequestController@destroy']);

    //information
    Route::resource('information', 'InformationController');
    Route::get('/getInformation', 'InformationController@getDatatable')->name('information.getDatatable');
    Route::post('information/destroy', ['as' => 'information.destroy', 'uses' => 'InformationController@destroy']);

    Route::resource('pages', 'PageController');
    Route::get('/getPages', 'PageController@getPages')->name('pages.getPages');
    Route::post('pages/destroy', ['as' => 'pages.destroy', 'uses' => 'PageController@destroy']);

    Route::resource('administratives', 'AdministrativeController');
    Route::get('/getAdministratives', 'AdministrativeController@getDatatable')->name('administratives.getDatatable');
    Route::post('administratives/destroy', ['as' => 'administratives.destroy', 'uses' => 'AdministrativeController@destroy']);

    Route::resource('ashom', 'AshomController');
    Route::get('/getAshom', 'AshomController@getDatatable')->name('ashom.getDatatable');
    Route::post('ashom/destroy', ['as' => 'ashom.destroy', 'uses' => 'AshomController@destroy']);

    Route::resource('attributes', 'AttributeController');
    Route::get('/getAttributes', 'AttributeController@getDatatable')->name('attributes.getDatatable');
    Route::post('attributes/destroy', ['as' => 'attributes.destroy', 'uses' => 'AttributeController@destroy']);

    Route::resource('cities', 'CityController');
    Route::get('/getCities', 'CityController@getDatatable')->name('cities.getDatatable');
    Route::post('cities/destroy', ['as' => 'cities.destroy', 'uses' => 'CityController@destroy']);

    Route::resource('jobs', 'JobController');
    Route::get('/getJobs', 'JobController@getDatatable')->name('jobs.getDatatable');
    Route::post('jobs/destroy', ['as' => 'jobs.destroy', 'uses' => 'JobController@destroy']);

    // Job Applications
    Route::resource('jobApplications', 'JobApplicationController');
    Route::get('/getJobApplications', 'JobApplicationController@getJobApplications')->name('jobApplications.getDatatable');
    Route::get('/getJobApplications/{id}', 'JobApplicationController@getJobApplicationsByJobId')->name('jobApplications.getDatatableByJobId');
    Route::post('jobApplications/destroy', ['as' => 'jobApplications.destroy', 'uses' => 'JobApplicationController@destroy']);

    Route::resource('volunteers', 'VolunteerController');
    Route::get('/getVolunteers', 'VolunteerController@getDatatable')->name('volunteers.getDatatable');
    Route::post('volunteers/destroy', ['as' => 'volunteers.destroy', 'uses' => 'VolunteerController@destroy']);

    // Volunteer Applications
    Route::resource('volunteerApplications', 'VolunteerApplicationController');
    Route::get('/getVolunteerApplications', 'VolunteerApplicationController@getVolunteerApplications')->name('volunteerApplications.getDatatable');
    Route::get('/getVolunteerApplications/{id}', 'VolunteerApplicationController@getVolunteerApplicationsByVolunteerId')->name('volunteerApplications.getDatatableByVolunteerId');
    Route::post('volunteerApplications/destroy', ['as' => 'volunteerApplications.destroy', 'uses' => 'VolunteerApplicationController@destroy']);

    Route::resource('nationalities', 'NationalityController');
    Route::get('/getNationalities', 'NationalityController@getDatatable')->name('nationalities.getDatatable');
    Route::post('nationalities/destroy', ['as' => 'nationalities.destroy', 'uses' => 'NationalityController@destroy']);

    Route::resource('qualifications', 'QualificationController');
    Route::get('/getQualifications', 'QualificationController@getDatatable')->name('qualifications.getDatatable');
    Route::post('qualifications/destroy', ['as' => 'qualifications.destroy', 'uses' => 'QualificationController@destroy']);

    Route::resource('sadakat', 'SadakatController');
    Route::get('/getSadakat', 'SadakatController@getDatatable')->name('sadakat.getDatatable');
    Route::post('sadakat/destroy', ['as' => 'sadakat.destroy', 'uses' => 'SadakatController@destroy']);
});
