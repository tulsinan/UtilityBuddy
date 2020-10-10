<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Utility Categories
    Route::apiResource('utility-categories', 'UtilityCategoriesApiController');

    // Payment Gateways
    Route::apiResource('payment-gateways', 'PaymentGatewaysApiController');

    // Utility Accounts
    Route::apiResource('utility-accounts', 'UtilityAccountsApiController');

    // Invoices
    Route::apiResource('invoices', 'InvoicesApiController');

    // Payment Histories
    Route::apiResource('payment-histories', 'PaymentHistoryApiController');
});