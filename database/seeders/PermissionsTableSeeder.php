<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_log_access',
            ],
            [
                'id'    => 20,
                'title' => 'utility_management_access',
            ],
            [
                'id'    => 21,
                'title' => 'utility_category_create',
            ],
            [
                'id'    => 22,
                'title' => 'utility_category_edit',
            ],
            [
                'id'    => 23,
                'title' => 'utility_category_show',
            ],
            [
                'id'    => 24,
                'title' => 'utility_category_delete',
            ],
            [
                'id'    => 25,
                'title' => 'utility_category_access',
            ],
            [
                'id'    => 26,
                'title' => 'payment_gateway_create',
            ],
            [
                'id'    => 27,
                'title' => 'payment_gateway_edit',
            ],
            [
                'id'    => 28,
                'title' => 'payment_gateway_show',
            ],
            [
                'id'    => 29,
                'title' => 'payment_gateway_delete',
            ],
            [
                'id'    => 30,
                'title' => 'payment_gateway_access',
            ],
            [
                'id'    => 31,
                'title' => 'utility_account_create',
            ],
            [
                'id'    => 32,
                'title' => 'utility_account_edit',
            ],
            [
                'id'    => 33,
                'title' => 'utility_account_show',
            ],
            [
                'id'    => 34,
                'title' => 'utility_account_delete',
            ],
            [
                'id'    => 35,
                'title' => 'utility_account_access',
            ],
            [
                'id'    => 36,
                'title' => 'invoice_create',
            ],
            [
                'id'    => 37,
                'title' => 'invoice_edit',
            ],
            [
                'id'    => 38,
                'title' => 'invoice_show',
            ],
            [
                'id'    => 39,
                'title' => 'invoice_delete',
            ],
            [
                'id'    => 40,
                'title' => 'invoice_access',
            ],
            [
                'id'    => 41,
                'title' => 'payment_history_create',
            ],
            [
                'id'    => 42,
                'title' => 'payment_history_edit',
            ],
            [
                'id'    => 43,
                'title' => 'payment_history_show',
            ],
            [
                'id'    => 44,
                'title' => 'payment_history_delete',
            ],
            [
                'id'    => 45,
                'title' => 'payment_history_access',
            ],
            [
                'id'    => 46,
                'title' => 'bill_forecast_access',
            ],
            [
                'id'    => 47,
                'title' => 'electricity_access',
            ],
            [
                'id'    => 48,
                'title' => 'water_access',
            ],
            [
                'id'    => 49,
                'title' => 'bill_tariff_access',
            ],
            [
                'id'    => 50,
                'title' => 'support_information_access',
            ],
            [
                'id'    => 51,
                'title' => 'statistic_access',
            ],
            [
                'id'    => 52,
                'title' => 'electricity_usage_access',
            ],
            [
                'id'    => 53,
                'title' => 'water_usage_access',
            ],
            [
                'id'    => 54,
                'title' => 'account_statistic_access',
            ],
            [
                'id'    => 55,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}