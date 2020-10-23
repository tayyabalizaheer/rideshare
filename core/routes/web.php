<?php
//Payment IPN
Route::get('/ipnbtc', 'PaymentController@ipnBchain')->name('ipn.bchain');
Route::get('/ipnblockbtc', 'PaymentController@blockIpnBtc')->name('ipn.block.btc');
Route::get('/ipnblocklite', 'PaymentController@blockIpnLite')->name('ipn.block.lite');
Route::get('/ipnblockdog', 'PaymentController@blockIpnDog')->name('ipn.block.dog');
Route::post('/ipnpaypal', 'PaymentController@ipnpaypal')->name('ipn.paypal');
Route::post('/ipnperfect', 'PaymentController@ipnperfect')->name('ipn.perfect');
Route::post('/ipnstripe', 'PaymentController@ipnstripe')->name('ipn.stripe');
Route::post('/ipnskrill', 'PaymentController@skrillIPN')->name('ipn.skrill');
Route::post('/ipncoinpaybtc', 'PaymentController@ipnCoinPayBtc')->name('ipn.coinPay.btc');
Route::post('/ipncoinpayeth', 'PaymentController@ipnCoinPayEth')->name('ipn.coinPay.eth');
Route::post('/ipncoinpaybch', 'PaymentController@ipnCoinPayBch')->name('ipn.coinPay.bch');
Route::post('/ipncoinpaydash', 'PaymentController@ipnCoinPayDash')->name('ipn.coinPay.dash');
Route::post('/ipncoinpaydoge', 'PaymentController@ipnCoinPayDoge')->name('ipn.coinPay.doge');
Route::post('/ipncoinpayltc', 'PaymentController@ipnCoinPayLtc')->name('ipn.coinPay.ltc');
Route::post('/ipncoin', 'PaymentController@ipnCoin')->name('ipn.coinpay');
Route::post('/ipncoingate', 'PaymentController@ipnCoinGate')->name('ipn.coingate');

Route::post('/ipnpaytm', 'PaymentController@ipnPayTm')->name('ipn.paytm');
Route::post('/ipnpayeer', 'PaymentController@ipnPayEer')->name('ipn.payeer');
Route::post('/ipnpaystack', 'PaymentController@ipnPayStack')->name('ipn.paystack');
Route::post('/ipnvoguepay', 'PaymentController@ipnVoguePay')->name('ipn.voguepay');
//Payment IPN


Route::get('/cron-notpay', 'FrontendController@cronNotPay')->name('cron-notpay');
Route::get('/cron-tripclose', 'FrontendController@cronTripClose')->name('cron-tripclose');

/*
 * Frontend Manage
 */

Route::get('/get_location/{id}', 'TripManageController@get_location')->name('get_location');
Route::get('/our_services', 'FrontendController@ourservies')->name('our-services');
Route::get('/', 'FrontendController@index')->name('homepage');
Route::get('/search', 'FrontendController@search')->name('search');


Route::get('/seat-book/details/{pnr}', 'FrontendController@travellerDetails')->name('seat-book.details');
Route::post('ticketPayment', 'FrontendController@ticketPayment')->name('ticketPayment');

Route::get('paymentPreview', 'FrontendController@paymentPreview')->name('paymentPreview');
Route::post('paymentPreview', 'PaymentController@ticketConfirm')->name('ticket.confirm');
Route::put('/seat-book/delete/{pnr}', 'FrontendController@seatBookDelete')->name('seat-book.delete');


Route::get('/vogue/{trx}/{type}', 'PaymentController@purchaseVogue')->name('vogue');


Route::get('/blog', 'FrontendController@blog')->name('blog');
Route::get('/details/{id}/{slug}', 'FrontendController@details')->name('blog.details');
Route::get('/cats/{id}/{slug}', 'FrontendController@categoryByBlog')->name('cats.blog');
Route::get('/about-us', 'FrontendController@about')->name('about');
Route::get('/faqs', 'FrontendController@faqs')->name('faqs');
Route::get('/click-add/{id}', 'FrontendController@clickadd');
Route::get('/contact-us', 'FrontendController@contactUs')->name('contact');
Route::post('/contact-us', 'FrontendController@contactSubmit')->name('contact.submit');
Route::post('/subscribe', 'FrontendController@subscribe')->name('subscribe');

Route::post('/enquiry', 'FrontendController@enquiry')->name('enquiry');

Route::get('/generatePDF', 'FrontendController@generatePDF')->name('generatePDF');
Route::get('/getTicket/{token}', 'FrontendController@getTicketPdf')->name('getTicket.pdf');
Route::get('/getTicket-print/{token}', 'FrontendController@getTicketPrintView')->name('ticket.print');


Route::get('/ticket-print','FrontendController@ticketPrint')->name('ticket-print');
Route::post('/ticket-print','FrontendController@getTicketPrint')->name('get.ticket-print');


Route::get('/change-lang/{lang}', 'FrontendController@changeLang')->name('lang');
Route::post('/g2fa-verify', 'FrontendController@verify2fa')->name('go2fa.verify');

Route::post('checkMail','FrontendController@checkMail')->name('checkMail');
Route::post('checkUsername','FrontendController@checkUsername')->name('checkUsername');

Auth::routes();

Route::group(['middleware' => ['auth', 'CheckStatus']], function () {
    Route::get('/view-seat/{id}', 'FrontendController@viewSeat')->name('view-seat');
    Route::post('checked-seat', 'FrontendController@checkedSeat')->name('checked-seat');
});

Route::group(['prefix' => 'user'], function () {

    Route::get('authorization', 'HomeController@authCheck')->name('user.authorization');

    Route::post('verification', 'HomeController@sendVcode')->name('user.send-vcode');
    Route::post('smsVerify', 'HomeController@smsVerify')->name('user.sms-verify');

    Route::post('verify-email', 'HomeController@sendEmailVcode')->name('user.send-emailVcode');
    Route::post('postEmailVerify', 'HomeController@postEmailVerify')->name('user.email-verify');


    Route::group(['middleware' => ['auth', 'CheckStatus']], function () {
     
        Route::get('/become_driver', 'HomeController@become_driver')->name('become.driver');
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/ticket-cancel','HomeController@ticketCancel')->name('ticket-cancel');
        Route::post('/ticket-cancel','HomeController@getTicketCancel')->name('get.ticket-cancel');

        Route::get('/withdraw-money', 'HomeController@withdrawMoney')->name('withdraw.money');
        Route::post('/withdraw-preview', 'HomeController@requestPreview')->name('withdraw.preview');
        Route::post('/withdraw-submit', 'HomeController@requestSubmit')->name('withdraw.submit');

        Route::get('/transactions', 'HomeController@activity')->name('user.trx');
        Route::get('/withdraw-log', 'HomeController@withdrawLog')->name('user.withdrawLog');

        Route::get('change-password', 'HomeController@changePassword')->name('user.change-password');
        Route::post('change-password', 'HomeController@submitPassword')->name('user.change-password');

        Route::get('my-profile', 'HomeController@editProfile')->name('edit-profile');
        Route::post('my-profile', 'HomeController@submitProfile')->name('edit-profile');
        Route::get('/user-login-history/{id}', 'GeneralSettingController@loginLogsByUsers')->name('user.login.history');

        Route::get('ticket-price', 'FleetController@ticketPrice')->name('ticket-price');
        
        Route::post('ticket-price', 'FleetController@ticketPriceStore')->name('ticket-price.store');
        Route::put('ticket-price/{id}', 'FleetController@ticketPriceUpdate')->name('ticket-price.update');
        Route::delete('ticket-price/{id}/delete', 'FleetController@ticketPriceDestroy')->name('ticket-price.delete');
        

        // route manage
        Route::get('manage-route', 'TripManageController@route')->name('manage-route');
        Route::get('manage-route/create', 'TripManageController@routeCreate')->name('manage-route.create');
        Route::post('manage-route/create', 'TripManageController@routeStore')->name('manage-route.store');
        Route::get('manage-route/{id}/edit', 'TripManageController@routeEdit')->name('manage-route.edit');
        Route::put('manage-route/{id}', 'TripManageController@routeUpdate')->name('manage-route.update');


        Route::get('trip-bookings','TripManageController@trip_bookings')->name('trip-bookings');
        Route::get('all-bookings','TripManageController@allbookings')->name('allbookings');

        Route::get('trip-assign', 'TripManageController@tripAssign')->name('trip-assign');
        Route::get('trip-assign/create', 'TripManageController@tripAssignCreate')->name('trip-assign.create');
        Route::post('trip-assign/create', 'TripManageController@tripAssignStore')->name('trip-assign.store');
        Route::get('trip-assign/{id}/edit', 'TripManageController@tripAssignEdit')->name('trip-assign.edit');
        Route::put('trip-assign/{id}', 'TripManageController@tripAssignUpdate')->name('trip-assign.update');
        
        Route::get('trip-close', 'TripManageController@tripClose')->name('trip-close');
        Route::get('trip-assign/{id}/close', 'TripManageController@tripAssignClose')->name('trip-assign.close');
        Route::get('chat/{val}', 'ChatController@index')->name('chat.index');
        Route::get('send_msg', 'ChatController@send_msg')->name('chat.send');

    });
});

 
 

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminLoginController@index')->name('admin.loginForm');
    Route::post('/', 'AdminLoginController@authenticate')->name('admin.login');
});





Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

    Route::resource('enquiry', 'EnquiryController');

    /*
     * Fleet Management
     */
    Route::get('fleet-type', 'FleetController@fleetType')->name('fleet-type');
    Route::post('fleet-type', 'FleetController@fleetTypeStore')->name('fleet-type.store');
    Route::put('fleet-type/{id}', 'FleetController@fleetTypeUpdate')->name('fleet-type.update');


    Route::get('fleet-registration', 'FleetController@fleetRegistration')->name('fleet-registration');
    Route::get('fleet-registration/create', 'FleetController@create')->name('fleet-registration.create');
    Route::post('fleet-registration/create', 'FleetController@store')->name('fleet-registration.store');
    Route::get('fleet-registration/{id}/edit', 'FleetController@edit')->name('fleet-registration.edit');
    Route::put('fleet-registration/{id}', 'FleetController@update')->name('fleet-registration.update');

    /*
     * Manage Trip Controller
     */ 
    Route::get('manage-location', 'TripManageController@location')->name('manage-location');
    Route::get('manage-location/create', 'TripManageController@locationCreate')->name('manage-location.create');
    Route::post('manage-location/create', 'TripManageController@locationStore')->name('manage-location.store');
    Route::get('manage-location/{id}/edit', 'TripManageController@locationEdit')->name('manage-location.edit');
    Route::put('manage-location/{id}', 'TripManageController@locationUpdate')->name('manage-location.update');

     



    
    


    
    Route::get('request-cancel', 'ManageTripController@reqeustCancellation')->name('request-cancel');
    Route::post('request-cancel', 'ManageTripController@reqeustCancellationAction')->name('request-cancel.action');

    // Popular Tour Controller
    Route::get('tour', 'PopularTourController@index')->name('admin.tour');
    Route::post('tour', 'PopularTourController@updateGnl');
    Route::get('tour/create', 'PopularTourController@create')->name('tour.create');
    Route::post('tour/create', 'PopularTourController@store')->name('tour.store');
    Route::delete('tour/delete', 'PopularTourController@destroy')->name('tour.delete');
    Route::get('tour/edit/{id}', 'PopularTourController@edit')->name('tour.edit');
    Route::post('tour-update', 'PopularTourController@updatePost')->name('tour.update');

    // Popular Destination Controller
    Route::get('destination', 'PopularDestinationController@index')->name('admin.destination');
    Route::post('destination', 'PopularDestinationController@updateGnl');
    Route::get('destination/create', 'PopularDestinationController@create')->name('destination.create');
    Route::post('destination/create', 'PopularDestinationController@store')->name('destination.store');
    Route::delete('destination/delete', 'PopularDestinationController@destroy')->name('destination.delete');
    Route::get('destination/edit/{id}', 'PopularDestinationController@edit')->name('destination.edit');
    Route::post('destination-update', 'PopularDestinationController@updatePost')->name('destination.update');


    // Blog Controller
    Route::get('/post-category', 'PostController@category')->name('admin.cat');
    Route::post('/post-category', 'PostController@UpdateCategory')->name('update.cat');
    Route::get('blog', 'PostController@index')->name('admin.blog');
    Route::get('blog/create', 'PostController@create')->name('blog.create');
    Route::post('blog/create', 'PostController@store')->name('blog.store');
    Route::delete('blog/delete', 'PostController@destroy')->name('blog.delete');
    Route::get('blog/edit/{id}', 'PostController@edit')->name('blog.edit');
    Route::post('blog-update', 'PostController@updatePost')->name('blog.update');

    //Slider
    Route::get('slider', 'WebSettingController@manageSlider')->name('slider');
    Route::post('slider', 'WebSettingController@storeSlider')->name('store.slider');
    Route::delete('slider', 'WebSettingController@deleteSlider')->name('slider-delete');


    //Gateway
    Route::get('/gateway', 'GatewayController@show')->name('gateway');
    Route::get('/gateway/{id}', 'GatewayController@edit')->name('gateway.edit');
    Route::post('/gateway', 'GatewayController@update')->name('update.gateway');

    //Deposit
    Route::get('/deposit', 'DepositController@index')->name('deposit');
    Route::get('/deposits', 'DepositController@index')->name('deposits');
    Route::get('/deposits/requests', 'DepositController@requests')->name('deposits.requests');
    Route::put('/deposit/approve/{id}', 'DepositController@approve')->name('deposit.approve');
    Route::get('/deposit/{deposit}/delete', 'DepositController@destroy')->name('deposit.destroy');

    //withdraw
    Route::get('/withdraw', 'WithdrawController@index')->name('withdraw');
    Route::post('/withdraw', 'WithdrawController@store')->name('add.withdraw.method');
    Route::post('/withdraw-update', 'WithdrawController@withdrawUpdateSettings')->name('update.wsettings');

    Route::get('/withdraw/requests', 'WithdrawController@requests')->name('withdraw.requests');
    Route::get('/withdraw/approved', 'WithdrawController@requestsApprove')->name('withdraw.approved');
    Route::get('/withdraw/refunded', 'WithdrawController@requestsRefunded')->name('withdraw.refunded');

    Route::put('/withdraw/approve/{id}', 'WithdrawController@approve')->name('withdraw.approve');
    Route::post('/withdraw/refund', 'WithdrawController@refundAmount')->name('withdraw.refund');





    // General Settings
    Route::get('/general-settings', 'GeneralSettingController@GenSetting')->name('admin.GenSetting');
    Route::post('/general-settings', 'GeneralSettingController@UpdateGenSetting')->name('admin.UpdateGenSetting');
    Route::get('/change-password', 'GeneralSettingController@changePassword')->name('admin.changePass');
    Route::post('/change-password', 'GeneralSettingController@updatePassword')->name('admin.changePass');
    Route::get('/profile', 'GeneralSettingController@profile')->name('admin.profile');
    Route::post('/profile', 'GeneralSettingController@updateProfile')->name('admin.profile');


    //User Management
    Route::get('users', 'GeneralSettingController@users')->name('users');
    Route::get('user-search', 'GeneralSettingController@userSearch')->name('search.users');
    Route::get('user/{user}', 'GeneralSettingController@singleUser')->name('user.single');
    Route::put('user/pass-change/{user}', 'GeneralSettingController@userPasschange')->name('user.passchange');
    Route::put('user/status/{user}', 'GeneralSettingController@statupdate')->name('user.status');
    Route::get('mail/{user}', 'GeneralSettingController@userEmail')->name('user.email');
    Route::post('/sendmail', 'GeneralSettingController@sendemail')->name('send.email');



    Route::get('/user-banned', 'GeneralSettingController@banusers')->name('user.ban');
    Route::get('login-logs/{user?}', 'GeneralSettingController@loginLogs')->name('user.login-logs');
    Route::get('/user-transaction/{id}', 'GeneralSettingController@userTrans')->name('user.trans');
    Route::get('/user-deposit/{id}', 'GeneralSettingController@userDeposit')->name('user.deposit');
    Route::get('/user-withdraw/{id}', 'GeneralSettingController@userWithdraw')->name('user.withdraw');


    //Contact Setting
    Route::get('contact-setting', 'WebSettingController@getContact')->name('contact-setting');
    Route::put('contact-setting/{id}', 'WebSettingController@putContactSetting')->name('contact-setting-update');

    Route::get('manage-logo', 'WebSettingController@manageLogo')->name('manage-logo');
    Route::post('manage-logo', 'WebSettingController@updateLogo')->name('manage-logo');

    Route::get('mange-breadcrumb', 'WebSettingController@mangeBreadcrumb')->name('mange-breadcrumb');
    Route::post('mange-breadcrumb', 'WebSettingController@updateBreadcrumb');

    Route::get('manage-text', 'WebSettingController@manageFooter')->name('manage-footer');
    Route::put('manage-text', 'WebSettingController@updateFooter')->name('manage-footer-update');

    Route::get('manage-social', 'WebSettingController@manageSocial')->name('manage-social');
    Route::post('manage-social', 'WebSettingController@storeSocial')->name('manage-social');
    Route::get('manage-social/{product_id?}', 'WebSettingController@editSocial')->name('social-edit');
    Route::put('manage-social/{product_id?}', 'WebSettingController@updateSocial')->name('social-edit');
    Route::post('delete-social', 'WebSettingController@destroySocial')->name('del.social');


    Route::get('manage-about', 'WebSettingController@manageAbout')->name('manage-about');
    Route::post('manage-about', 'WebSettingController@updateAbout')->name('manage-about');

    Route::get('manage-privacy', 'WebSettingController@managePrivacy')->name('manage-privacy');
    Route::post('manage-privacy', 'WebSettingController@updatePrivacy')->name('manage-privacy');

    Route::get('manage-terms', 'WebSettingController@manageTerms')->name('manage-terms');
    Route::post('manage-terms', 'WebSettingController@updateTerms')->name('manage-terms');

    Route::get('faqs-create', 'WebSettingController@createFaqs')->name('faqs-create');
    Route::post('faqs-create', 'WebSettingController@storeFaqs')->name('faqs-create');
    Route::get('faqs-all', 'WebSettingController@allFaqs')->name('faqs-all');
    Route::get('faqs-edit/{id}', 'WebSettingController@editFaqs')->name('faqs-edit');
    Route::put('faqs-edit/{id}', 'WebSettingController@updateFaqs')->name('faqs-update');
    Route::delete('faqs-delete', 'WebSettingController@deleteFaqs')->name('faqs-delete');


    Route::get('/subscribers', 'DashboardController@manageSubscribers')->name('manage.subscribers');
    Route::post('/update-subscribers', 'DashboardController@updateSubscriber')->name('update.subscriber');
    Route::get('/send-email', 'DashboardController@sendMail')->name('send.mail.subscriber');
    Route::post('/send-email', 'DashboardController@sendMailsubscriber')->name('send.email.subscriber');


    


    Route::get('/logout', 'AdminController@logout')->name('admin.logout');
});



/*============== User Password Reset Route list ===========================*/
Route::get('user-password/reset', 'User\ForgotPasswordController@showLinkRequestForm')->name('user.password.request');
Route::post('user-password/email', 'User\ForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
Route::get('user-password/reset/{token}', 'User\ResetPasswordController@showResetForm')->name('user.password.reset');
Route::post('user-password/reset', 'User\ResetPasswordController@reset');





