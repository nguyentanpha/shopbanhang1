<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\Roles;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::truncate();
        DB::table('admin_roles')->truncate();
        $adminRoles = Roles::where('name','admin')->first();
        $authorRoles = Roles::where('name','author')->first();
        $userRoles = Roles::where('name','user')->first();

        $admin = Admin::create([
            'admin_name'=>'TanPha',
            'admin_email'=>'phu1971vn@gmail.com',
            'admin_phone'=>'0906222453',
            'admin_password'=>'123123'
        ]);

        $author = Admin::create([
            'admin_name'=>'NguyenTanPha',
            'admin_email'=>'nhanvien@gmail.com',
            'admin_phone'=>'0906222453',
            'admin_password'=>'123123'
        ]);

        $user = Admin::create([
            'admin_name'=>'Pha',
            'admin_email'=>'phavn@gmail.com',
            'admin_phone'=>'0906222453',
            'admin_password'=>'123123'
        ]);
        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);
        factory(App\Admin::class,10)->create();
    }
}
