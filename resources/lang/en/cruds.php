<?php

return [
    'userManagement'     => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'         => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'               => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user'               => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'auditLog'           => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'userLog'            => [
        'title'          => 'User Logs',
        'title_singular' => 'User Log',
    ],
    'utilityManagement'  => [
        'title'          => 'Utility Management',
        'title_singular' => 'Utility Management',
    ],
    'utilityCategory'    => [
        'title'          => 'Utility Categories',
        'title_singular' => 'Utility Category',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'utility_name'           => 'Utility Company Name',
            'utility_name_helper'    => ' ',
            'utility_website'        => 'Utility Company Website Address',
            'utility_website_helper' => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'utility_type'           => 'Utility Type',
            'utility_type_helper'    => ' ',
        ],
    ],
    'paymentGateway'     => [
        'title'          => 'Payment Gateways',
        'title_singular' => 'Payment Gateway',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'gateway_name'           => 'Gateway Name',
            'gateway_name_helper'    => ' ',
            'gateway_address'        => 'Gateway Website Address',
            'gateway_address_helper' => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'utilityAccount'     => [
        'title'          => 'Utility Accounts',
        'title_singular' => 'Utility Account',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'utility_name'          => 'Utility Name',
            'utility_name_helper'   => ' ',
            'account_number'        => 'Utility Account Number',
            'account_number_helper' => ' ',
            'account_name'          => 'Account Name',
            'account_name_helper'   => ' ',
            'account_phone'         => 'Phone Number',
            'account_phone_helper'  => ' ',
            'property_type'         => 'Account Category',
            'property_type_helper'  => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'utility_type'          => 'Utility Type',
            'utility_type_helper'   => ' ',
            'created_by'            => 'Created By',
            'created_by_helper'     => ' ',
            'account_status'        => 'Account Status',
            'account_status_helper' => ' ',
            'address_line_1'        => 'Street Address',
            'address_line_1_helper' => ' ',
            'address_line_2'        => 'Street Address 2 (Optional)',
            'address_line_2_helper' => ' ',
            'town'                  => 'Town',
            'town_helper'           => ' ',
            'city'                  => 'City',
            'city_helper'           => ' ',
            'state'                 => 'State',
            'state_helper'          => ' ',
        ],
    ],
    'invoice'            => [
        'title'          => 'Invoices',
        'title_singular' => 'Invoice',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => ' ',
            'utility_type'               => 'Utility Type',
            'utility_type_helper'        => ' ',
            'utility_companyname'        => 'Utility Company Name',
            'utility_companyname_helper' => ' ',
            'account_number'             => 'Account Number',
            'account_number_helper'      => ' ',
            'property_type'              => 'Property Type',
            'property_type_helper'       => ' ',
            'date'                       => 'Invoice Date',
            'date_helper'                => ' ',
            'amount'                     => 'Due Amount',
            'amount_helper'              => ' ',
            'description'                => 'Description',
            'description_helper'         => ' ',
            'payment_status'             => 'Payment Status',
            'payment_status_helper'      => ' ',
            'created_at'                 => 'Created at',
            'created_at_helper'          => ' ',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => ' ',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => ' ',
            'created_by'                 => 'Created By',
            'created_by_helper'          => ' ',
            'date_due'                   => 'Due Date',
            'date_due_helper'            => ' ',
            'town'                       => 'Town',
            'town_helper'                => ' ',
            'city'                       => 'City',
            'city_helper'                => ' ',
            'state'                      => 'State',
            'state_helper'               => ' ',
        ],
    ],
    'paymentHistory'     => [
        'title'          => 'Payment History',
        'title_singular' => 'Payment History',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'account_number'        => 'Account Number',
            'account_number_helper' => ' ',
            'invoice_date'          => 'Invoice Date',
            'invoice_date_helper'   => ' ',
            'invoice_amount'        => 'Invoice Amount',
            'invoice_amount_helper' => ' ',
            'gateway_name'          => 'Gateway Name',
            'gateway_name_helper'   => ' ',
            'payment_status'        => 'Payment Status',
            'payment_status_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'created_by'            => 'Created By',
            'created_by_helper'     => ' ',
            'payment_date'          => 'Payment Date',
            'payment_date_helper'   => ' ',
        ],
    ],
    'billForecast'       => [
        'title'          => 'Bill Forecast',
        'title_singular' => 'Bill Forecast',
    ],
    'electricity'        => [
        'title'          => 'Electricity',
        'title_singular' => 'Electricity',
    ],
    'water'              => [
        'title'          => 'Water',
        'title_singular' => 'Water',
    ],
    'billTariff'         => [
        'title'          => 'Bill Fees and Tariffs',
        'title_singular' => 'Bill Fees and Tariff',
    ],
    'supportInformation' => [
        'title'          => 'Help and Documentation',
        'title_singular' => 'Help and Documentation',
    ],
    'statistic'          => [
        'title'          => 'Statistics',
        'title_singular' => 'Statistic',
    ],
];