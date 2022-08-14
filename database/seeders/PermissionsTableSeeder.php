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
                'title' => 'main_menu_access',
            ],
            [
                'id'    => 18,
                'title' => 'about_create',
            ],
            [
                'id'    => 19,
                'title' => 'about_edit',
            ],
            [
                'id'    => 20,
                'title' => 'about_show',
            ],
            [
                'id'    => 21,
                'title' => 'about_delete',
            ],
            [
                'id'    => 22,
                'title' => 'about_access',
            ],
            [
                'id'    => 23,
                'title' => 'contact_field_create',
            ],
            [
                'id'    => 24,
                'title' => 'contact_field_edit',
            ],
            [
                'id'    => 25,
                'title' => 'contact_field_show',
            ],
            [
                'id'    => 26,
                'title' => 'contact_field_delete',
            ],
            [
                'id'    => 27,
                'title' => 'contact_field_access',
            ],
            [
                'id'    => 28,
                'title' => 'page_create',
            ],
            [
                'id'    => 29,
                'title' => 'page_edit',
            ],
            [
                'id'    => 30,
                'title' => 'page_show',
            ],
            [
                'id'    => 31,
                'title' => 'page_delete',
            ],
            [
                'id'    => 32,
                'title' => 'page_access',
            ],
            [
                'id'    => 33,
                'title' => 'product_create',
            ],
            [
                'id'    => 34,
                'title' => 'product_edit',
            ],
            [
                'id'    => 35,
                'title' => 'product_show',
            ],
            [
                'id'    => 36,
                'title' => 'product_delete',
            ],
            [
                'id'    => 37,
                'title' => 'product_access',
            ],
            [
                'id'    => 38,
                'title' => 'contact_us_create',
            ],
            [
                'id'    => 39,
                'title' => 'contact_us_edit',
            ],
            [
                'id'    => 40,
                'title' => 'contact_us_show',
            ],
            [
                'id'    => 41,
                'title' => 'contact_us_delete',
            ],
            [
                'id'    => 42,
                'title' => 'contact_us_access',
            ],
            [
                'id'    => 43,
                'title' => 'partner_create',
            ],
            [
                'id'    => 44,
                'title' => 'partner_edit',
            ],
            [
                'id'    => 45,
                'title' => 'partner_show',
            ],
            [
                'id'    => 46,
                'title' => 'partner_delete',
            ],
            [
                'id'    => 47,
                'title' => 'partner_access',
            ],
            [
                'id'    => 48,
                'title' => 'portfolio_create',
            ],
            [
                'id'    => 49,
                'title' => 'portfolio_edit',
            ],
            [
                'id'    => 50,
                'title' => 'portfolio_show',
            ],
            [
                'id'    => 51,
                'title' => 'portfolio_delete',
            ],
            [
                'id'    => 52,
                'title' => 'portfolio_access',
            ],
            [
                'id'    => 53,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
