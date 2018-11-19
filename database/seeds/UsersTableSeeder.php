<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Phan Nhân Đạt',
            'email' => 'phannhandat@gmail.com',
            'phone' => '0372505286',
            'address' => 'Hà Nội',
            'username' => 'datpn0602',
            'password' => bcrypt('123456'),
            'avatar' => 'user.png',
            'confirm_password' => bcrypt('123456'),
            'level' => 1
        ]);
    }
}
