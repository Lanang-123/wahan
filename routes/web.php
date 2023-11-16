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

Route::group(['namespace' => 'Auth'], function () {
    Route::get('', 'LoginController@signInForm')->name('sign-in-form');
    Route::post('', 'LoginController@submitSignIn')->name('submit-sign-in');
    Route::get('logout', 'LoginController@logout')->name('logout');
});

Route::group(['middleware' => ['user.auth', 'user.access']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/live-dashboard', 'DashboardController@live')->name('live-dashboard');

    Route::group(['prefix' => 'ticket-types'], function () {
        Route::get('', 'TicketTypeController@index')->name('ticket-type-list');
        Route::get('new', 'TicketTypeController@form')->name('new-ticket-type');
        Route::get('edit/{slug}', 'TicketTypeController@form')->name('edit-ticket-type');
        Route::post('', 'TicketTypeController@create')->name('create-ticket-type');
        Route::post('{slug}', 'TicketTypeController@update')->name('update-ticket-type');
        Route::get('delete/{slug}', 'TicketTypeController@delete')->name('delete-ticket-type');
    });

    Route::group(['prefix' => 'tickets'], function () {
        Route::get('', 'TicketController@index')->name('ticket-list');
        Route::get('new', 'TicketController@form')->name('new-ticket');
        Route::get('edit/{code}', 'TicketController@form')->name('edit-ticket');
        Route::post('', 'TicketController@create')->name('create-ticket');
        Route::post('{code}', 'TicketController@update')->name('update-ticket');
        Route::get('delete/{code}', 'TicketController@delete')->name('delete-ticket');
        Route::get('delete-expired', 'TicketController@deleteExpired')->name('delete-expired-ticket');
    });

    Route::group(['prefix' => 'car-types'], function () {
        Route::get('', 'CarTypeController@index')->name('car-type-list');
        Route::get('new', 'CarTypeController@form')->name('new-car-type');
        Route::get('edit/{slug}', 'CarTypeController@form')->name('edit-car-type');
        Route::post('', 'CarTypeController@create')->name('create-car-type');
        Route::post('{slug}', 'CarTypeController@update')->name('update-car-type');
        Route::get('delete/{slug}', 'CarTypeController@delete')->name('delete-car-type');
    });

    Route::group(['prefix' => 'ride-owners'], function () {
        Route::get('', 'RideOwnerController@index')->name('ride-owner-list');
        Route::get('new', 'RideOwnerController@form')->name('new-ride-owner');
        Route::get('edit/{uuid}', 'RideOwnerController@form')->name('edit-ride-owner');
        Route::post('', 'RideOwnerController@create')->name('create-ride-owner');
        Route::post('{uuid}', 'RideOwnerController@update')->name('update-ride-owner');
        Route::get('delete/{uuid}', 'RideOwnerController@delete')->name('delete-ride-owner');
    });

    Route::group(['prefix' => 'rides'], function () {
        Route::get('', 'RideController@index')->name('ride-list');
        Route::get('new', 'RideController@form')->name('new-ride');
        Route::get('edit/{slug}', 'RideController@form')->name('edit-ride');
        Route::post('', 'RideController@create')->name('create-ride');
        Route::post('{slug}', 'RideController@update')->name('update-ride');
        Route::get('delete/{slug}', 'RideController@delete')->name('delete-ride');
    });

    Route::group(['prefix' => 'guides'], function () {
        Route::get('', 'GuideController@index')->name('guide-list');
        Route::get('new', 'GuideController@form')->name('new-guide');
        Route::get('edit/{uuid}', 'GuideController@form')->name('edit-guide');
        Route::post('', 'GuideController@create')->name('create-guide');
        Route::post('{uuid}', 'GuideController@update')->name('update-guide');
        Route::get('delete/{uuid}', 'GuideController@delete')->name('delete-guide');
    });

    Route::group(['prefix' => 'vouchers'], function () {
        Route::get('', 'VoucherController@index')->name('voucher-list');
        Route::get('new', 'VoucherController@form')->name('new-voucher');
        Route::get('edit/{code}', 'VoucherController@form')->name('edit-voucher');
        Route::post('', 'VoucherController@create')->name('create-voucher');
        Route::post('{code}', 'VoucherController@update')->name('update-voucher');
        Route::get('delete/{code}', 'VoucherController@delete')->name('delete-voucher');
    });

    Route::group(['prefix' => 'prints'], function () {
        Route::get('', 'HandoverController@index')->name('print-list');
        Route::get('new', 'HandoverController@form')->name('new-print');
        Route::post('', 'HandoverController@create')->name('create-print');
        Route::get('download/{id}', 'HandoverController@download')->name('download-print');
    });

    Route::group(['prefix' => 'handovers'], function () {
        Route::get('', 'HandoverController@index')->name('handover-list');
        Route::get('detail/{id}', 'HandoverController@detail')->name('detail-handover');
        Route::post('detail/{id}', 'HandoverController@accepted')->name('accepted-handover');
    });


    Route::group(['prefix' => 'checkins'], function () {
        Route::get('parking', 'CheckinController@parkingForm')->name('new-parking');
        Route::post('parking', 'CheckinController@parkingCreate')->name('create-parking');
        Route::get('parking/{id}', 'CheckinController@parkingPrint')->name('print-parking');

        Route::get('object', 'CheckinController@objectForm')->name('new-object');
        Route::post('object', 'CheckinController@objectCreate')->name('create-object');

        Route::get('ride', 'CheckinController@rideForm')->name('new-checkin-ride');
        Route::post('ride', 'CheckinController@rideCreate')->name('create-checkin-ride');
    });

    Route::group(['prefix' => 'orders'], function () {
        Route::get('', 'OrderController@orderList')->name('order-list');
        Route::get('new', 'OrderController@form')->name('new-order');
        Route::post('', 'OrderController@create')->name('create-order');
        Route::get('order/{id}', 'OrderController@orderPrint')->name('print-order');
        Route::get('cancel-order/{id}', 'OrderController@cancelOrder')->name('cancel-order');
        // Route::get('check-code/{code}', 'OrderController@checkCode')->name('check-code');

        Route::get('new-with-parking', 'OrderController@formWithParking')->name('new-order-with-parking');
        // Route::post('new-with-parking', 'OrderController@submitParkingNumber')->name('submit-parking-number');
        Route::get('with-parking', 'OrderController@createWithParking')->name('create-order-with-parking');
    });
    Route::group(['prefix' => 'orders'], function () {
    });

    Route::group(['prefix' => 'transfer-fees'], function () {
        Route::get('', 'OrderController@transferFeeIndex')->name('transfer-fee-list');
        Route::get('new', 'OrderController@form')->name('new-transfer-fee');
        Route::get('transfer/{id}', 'OrderController@transferFeeForm')->name('edit-transfer-fee');
        Route::post('form', 'OrderController@transferFeeByOrderNumber')->name('form-transfer-fee');
        Route::post('transfer', 'OrderController@createTransferFee')->name('create-transfer-fee');
    });

    Route::group(['prefix' => 'reports'], function () {
        Route::get('tickets', 'ReportController@ticket')->name('report-tickets');
        Route::get('vouchers', 'ReportController@voucher')->name('report-vouchers');
        Route::get('object', 'ReportController@object')->name('report-object');
        Route::get('rides', 'ReportController@ride')->name('report-rides');
        Route::get('parkings', 'ReportController@parking')->name('report-parkings');
        Route::get('fee-transfers', 'ReportController@feeTransfer')->name('report-fee-transfers');
        Route::get('sales', 'ReportController@sales')->name('report-sales');
        Route::get('cancel-order', 'ReportController@cancelOrder')->name('report-cancel-order');
        Route::get('checkout', 'ReportController@checkout')->name('report-checkout');

        Route::get('csv', 'ReportController@readCsv')->name('read-csv');
        Route::get('compare-csv', 'ReportController@compareCsv')->name('compare-csv');
    });


    //default
    Route::group(['prefix' => 'users'], function () {
        Route::get('', 'UserController@index')->name('user-list');
        Route::get('new', 'UserController@form')->name('new-user');
        Route::get('edit/{uuid}', 'UserController@form')->name('edit-user');
        Route::get('edit-password/{uuid}', 'UserController@passwordForm')->name('edit-password-user');
        Route::post('', 'UserController@create')->name('create-user');
        Route::post('{uuid}', 'UserController@update')->name('update-user');
        Route::post('update-password/{uuid}', 'UserController@updatePassword')->name('update-password-user');
        Route::get('delete/{uuid}', 'UserController@delete')->name('delete-user');
    });

    Route::group(['prefix' => 'roles'], function () {
        Route::get('', 'RoleController@index')->name('role-list');
        Route::get('new', 'RoleController@form')->name('new-role');
        Route::get('edit/{uuid}', 'RoleController@form')->name('edit-role');
        Route::post('', 'RoleController@create')->name('create-role');
        Route::post('{uuid}', 'RoleController@update')->name('update-role');
        Route::get('delete/{uuid}', 'RoleController@delete')->name('delete-role');
    });

    Route::group(['prefix' => 'profil'], function () {
        Route::get('', 'SettingController@profil')->name('profil');
        Route::post('', 'SettingController@updateProfil')->name('update-profil');
    });

    Route::group(['prefix' => 'ticket-expiration'], function () {
        Route::get('', 'SettingController@ticketExpiration')->name('ticket-expiration');
        Route::post('', 'SettingController@updateTicketExpiration')->name('update-ticket-expiration');
    });

    Route::get('/test', function () {
        return view('starter.test');
    })->name('test');
});

Route::group(['prefix' => 'orders'], function () {
    Route::get('check-code/{code}', 'OrderController@checkCode')->name('check-code');
});


Route::get('/sign-up', function () {
    return view('starter.sign-up');
})->name('sign-up');

Route::get('/forgot-password', function () {
    return view('starter.forgot-password');
})->name('forgot-password');



