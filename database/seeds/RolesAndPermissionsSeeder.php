<?php
/**
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/24/20, 3:12 PM
 * Last Modified: 1/23/20, 10:53 PM
 * Project Name: Wafaq
 * File Name: RolesAndPermissionsSeeder.php
 */

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') != 'dev') {
            return;
        }

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::where('id','!=','0')->delete();

        // create permissions
        // admins
        Permission::create(['name' => 'admins.manage']);
        Permission::create(['name' => 'admins.add' ]);
        Permission::create(['name' => 'admins.edit']);
        Permission::create(['name' => 'admins.delete']);

        // contactus
        Permission::create(['name' => 'contactus.manage']);

        // permissions
        Permission::create(['name' => 'permissions.manage']);

        // permissions
        Permission::create(['name' => 'roles.manage']);

        // sliders
        Permission::create(['name' => 'sliders.manage']);
        Permission::create(['name' => 'sliders.add' ]);
        Permission::create(['name' => 'sliders.edit']);
        Permission::create(['name' => 'sliders.delete']);


        // pages
        Permission::create(['name' => 'pages.manage']);
        Permission::create(['name' => 'pages.add' ]);
        Permission::create(['name' => 'pages.edit']);
        Permission::create(['name' => 'pages.delete']);

        // items
        Permission::create(['name' => 'items.manage']);
        Permission::create(['name' => 'items.add' ]);
        Permission::create(['name' => 'items.edit']);
        Permission::create(['name' => 'items.delete']);

        // administratives
        Permission::create(['name' => 'administratives.manage']);
        Permission::create(['name' => 'administratives.add' ]);
        Permission::create(['name' => 'administratives.edit']);
        Permission::create(['name' => 'administratives.delete']);

        // albums
        Permission::create(['name' => 'albums.manage']);
        Permission::create(['name' => 'albums.add' ]);
        Permission::create(['name' => 'albums.edit']);
        Permission::create(['name' => 'albums.delete']);

        // ashom
        Permission::create(['name' => 'ashom.manage']);
        Permission::create(['name' => 'ashom.add' ]);
        Permission::create(['name' => 'ashom.edit']);
        Permission::create(['name' => 'ashom.delete']);

//        // attributes
//        Permission::create(['name' => 'attributes.manage']);
//        Permission::create(['name' => 'attributes.add' ]);
//        Permission::create(['name' => 'attributes.edit']);
//        Permission::create(['name' => 'attributes.delete']);

        // cities
        Permission::create(['name' => 'cities.manage']);
        Permission::create(['name' => 'cities.add' ]);
        Permission::create(['name' => 'cities.edit']);
        Permission::create(['name' => 'cities.delete']);

        // jobs
        Permission::create(['name' => 'jobs.manage']);
        Permission::create(['name' => 'jobs.add' ]);
        Permission::create(['name' => 'jobs.edit']);
        Permission::create(['name' => 'jobs.delete']);

        // jobApplications
        Permission::create(['name' => 'jobApplications.manage']);
//        Permission::create(['name' => 'jobApplications.add' ]);
//        Permission::create(['name' => 'jobApplications.edit']);
        Permission::create(['name' => 'jobApplications.delete']);

        // nationalities
        Permission::create(['name' => 'nationalities.manage']);
        Permission::create(['name' => 'nationalities.add' ]);
        Permission::create(['name' => 'nationalities.edit']);
        Permission::create(['name' => 'nationalities.delete']);

        // news
        Permission::create(['name' => 'news.manage']);
        Permission::create(['name' => 'news.add' ]);
        Permission::create(['name' => 'news.edit']);
        Permission::create(['name' => 'news.delete']);


        // newsCategories
        Permission::create(['name' => 'newsCategories.manage']);
        Permission::create(['name' => 'newsCategories.add' ]);
        Permission::create(['name' => 'newsCategories.edit']);
        Permission::create(['name' => 'newsCategories.delete']);

        // qualifications
        Permission::create(['name' => 'qualifications.manage']);
        Permission::create(['name' => 'qualifications.add' ]);
        Permission::create(['name' => 'qualifications.edit']);
        Permission::create(['name' => 'qualifications.delete']);

        // sadakat
        Permission::create(['name' => 'sadakat.manage']);
        Permission::create(['name' => 'sadakat.add' ]);
        Permission::create(['name' => 'sadakat.edit']);
        Permission::create(['name' => 'sadakat.delete']);

        // videos
        Permission::create(['name' => 'videos.manage']);
        Permission::create(['name' => 'videos.add' ]);
        Permission::create(['name' => 'videos.edit']);
        Permission::create(['name' => 'videos.delete']);

//        // zakah
//        Permission::create(['name' => 'zakah.manage']);
//        Permission::create(['name' => 'zakah.add' ]);
//        Permission::create(['name' => 'zakah.edit']);
//        Permission::create(['name' => 'zakah.delete']);

        // helpRequests
        Permission::create(['name' => 'helpRequests.manage']);
        Permission::create(['name' => 'helpRequests.add' ]);
        Permission::create(['name' => 'helpRequests.edit']);
        Permission::create(['name' => 'helpRequests.delete']);

        // orders
        Permission::create(['name' => 'orders.manage']);
        Permission::create(['name' => 'orders.add' ]);
        Permission::create(['name' => 'orders.edit']);
        Permission::create(['name' => 'orders.delete']);

        // create roles and assign created permissions

        Role::where('id','!=','0')->delete();

        $role = Role::create(['name' => 'super-admin']);
        $role->syncPermissions(Permission::all());
    }
}
