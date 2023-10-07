<?php
/**
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/24/20, 3:12 PM
 * Last Modified: 1/23/20, 10:53 PM
 * Project Name: Wafaq
 * File Name: AdminTableSeeder.php
 */

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (env('APP_ENV') != 'dev') {
            return;
        }

        DB::table('admins')->whereNotNull('id')->delete();
        auth()->guard('admin');
        $admin = Admin::create([
            'id' => '1',
            'name' => 'Tariq Ayman',
            'email' => 'admin@admin.com',
            'password' => '123456',
        ]);
        auth()->guard('admin')->login($admin);

        $role = Role::where('name' , 'super-admin')->first();
        $admin->assignRole($role);
        $admin->syncPermissions($role->getAllPermissions());
    }
}
