<?php

namespace Djavue\Auth\Database\Seeds;

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
	protected $trans = [];
	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'title' => 'user_management_access',], // user manager
            ['id' => 2, 'title' => 'permission_access',],
            ['id' => 3, 'title' => 'permission_create',],
            ['id' => 4, 'title' => 'permission_edit',],
            ['id' => 5, 'title' => 'permission_view',],
            ['id' => 6, 'title' => 'permission_delete',],
            ['id' => 7, 'title' => 'role_access',],
            ['id' => 8, 'title' => 'role_create',],
            ['id' => 9, 'title' => 'role_edit',],
            ['id' => 10, 'title' => 'role_view',],
            ['id' => 11, 'title' => 'role_delete',],
            ['id' => 12, 'title' => 'user_access',],
            ['id' => 13, 'title' => 'user_create',],
            ['id' => 14, 'title' => 'user_edit',],
            ['id' => 15, 'title' => 'user_view',],
            ['id' => 16, 'title' => 'user_delete',],
            

            ['id' => 100, 'title' => 'system_management_access',], // system management
			['id' => 101, 'title' => 'project_access',],
            ['id' => 102, 'title' => 'project_create',],
            ['id' => 103, 'title' => 'project_edit',],
            ['id' => 104, 'title' => 'project_view',],
            ['id' => 105, 'title' => 'project_delete',],
			['id' => 106, 'title' => 'page_access',],
            ['id' => 107, 'title' => 'page_create',],
            ['id' => 108, 'title' => 'page_edit',],
            ['id' => 109, 'title' => 'page_view',],
            ['id' => 110, 'title' => 'page_delete',],
            ['id' => 111, 'title' => 'category_access',],
            ['id' => 112, 'title' => 'category_create',],
            ['id' => 113, 'title' => 'category_edit',],
            ['id' => 114, 'title' => 'category_view',],
            ['id' => 115, 'title' => 'category_delete',],
            ['id' => 116, 'title' => 'post_access',],
            ['id' => 117, 'title' => 'post_create',],
            ['id' => 118, 'title' => 'post_edit',],
            ['id' => 119, 'title' => 'post_view',],
            ['id' => 120, 'title' => 'post_delete',],
			
			['id' => 200, 'title' => 'application_management_access',], // cms engine
			['id' => 201, 'title' => 'background_access',],
            ['id' => 202, 'title' => 'background_create',],
            ['id' => 203, 'title' => 'background_edit',],
            ['id' => 204, 'title' => 'background_view',],
            ['id' => 205, 'title' => 'background_delete',],
			['id' => 206, 'title' => 'inner_background_access',],
            ['id' => 207, 'title' => 'inner_background_create',],
            ['id' => 208, 'title' => 'inner_background_edit',],
            ['id' => 209, 'title' => 'inner_background_view',],
            ['id' => 210, 'title' => 'inner_background_delete',],
			['id' => 211, 'title' => 'popup_access',],
            ['id' => 212, 'title' => 'popup_create',],
            ['id' => 213, 'title' => 'popup_edit',],
            ['id' => 214, 'title' => 'popup_view',],
            ['id' => 215, 'title' => 'popup_delete',],

        ];

        foreach ($items as $item) {
            \Djavue\Auth\Models\Permission::create($item);
        }
    }
}
