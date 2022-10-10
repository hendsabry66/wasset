<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     */
    public function run()
    {
        $permissions = [
            'country-list',
            'country-create',
            'country-edit',
            'country-delete',
            'city-list',
            'city-create',
            'city-edit',
            'city-delete',
             'users-list',
            'users-create',
            'users-edit',
            'users-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete' ,
            'page-list',
            'page-create',
            'page-edit',
            'page-delete',
           'ad-list',
            'ad-create',
            'ad-edit',
            'ad-delete',
            'banner-list',
            'banner-create',
            'banner-edit',
            'banner-delete',
            'contact-list',
            'contact-create',
            'contact-edit',
            'contact-delete',

            'dashboard-list',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',




        ];

//        foreach ($permissions as $permission) {
//            Permission::create(['name' => $permission]);
//        }
//        //create User
       // $user = \App\Models\User::find(1);
        $user = \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@demo.com',
            'phone' => '898465879',

            'password' => bcrypt('123456')
        ]);
//
//        //create Role
        $role = Role::create(['name' => 'admin','guard_name' => 'web']);
        //$role= Role::find(1);
//
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);


  }
}
