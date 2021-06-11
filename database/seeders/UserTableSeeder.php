<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "name"=>"Super Admin",
            "email"=>"superadmin@gmail.com",
            "password"=>bcrypt(1234),
            "role"=>"superadmin",
           
        ]);
        DB::table('users')->insert([
            "name"=>"Assistant Admin",
            "email"=>"admin@gmail.com",
            "password"=>bcrypt(1234),
            "role"=>"admin",
           
        ]);
    }
}
