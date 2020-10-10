<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Logs
    Route::resource('user-logs', 'UserLogsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Utility Categories
    Route::delete('utility-categories/destroy', 'UtilityCategoriesController@massDestroy')->name('utility-categories.massDestroy');
    Route::resource('utility-categories', 'UtilityCategoriesController');

    // Payment Gateways
    Route::delete('payment-gateways/destroy', 'PaymentGatewaysController@massDestroy')->name('payment-gateways.massDestroy');
    Route::resource('payment-gateways', 'PaymentGatewaysController');

    // Utility Accounts
    Route::delete('utility-accounts/destroy', 'UtilityAccountsController@massDestroy')->name('utility-accounts.massDestroy');
    Route::resource('utility-accounts', 'UtilityAccountsController');

    // Invoices
    Route::delete('invoices/destroy', 'InvoicesController@massDestroy')->name('invoices.massDestroy');
    Route::resource('invoices', 'InvoicesController');

    // Payment Histories
    Route::delete('payment-histories/destroy', 'PaymentHistoryController@massDestroy')->name('payment-histories.massDestroy');
    Route::resource('payment-histories', 'PaymentHistoryController');

    // Electricities
    Route::resource('electricities', 'ElectricityController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Waters
    Route::resource('waters', 'WaterController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Bill Tariffs
    Route::resource('bill-tariffs', 'BillTariffsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Support Informations
    Route::resource('support-informations', 'SupportInformationController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Electricity Usages
    Route::resource('electricity-usages', 'ElectricityUsageController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Water Usages
    Route::resource('water-usages', 'WaterUsageController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Account Statistics
    //Route::get('account-statistics','AccountStatisticsController@index');
    Route::resource('account-statistics', 'AccountStatisticsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});

Route::get('paypal/checkout/{id}', 'PaypalController@getExpressCheckout')->name('paypal.checkout');
Route::get('paypal/checkout-success/{id}', 'PaypalController@getExpressCheckoutSuccess')->name('paypal.success');
Route::get('paypal/checkout-cancel', 'PaypalController@cancelPage')->name('paypal.cancel');
//Route::post('paypal/notify', 'PaypalController@notify');