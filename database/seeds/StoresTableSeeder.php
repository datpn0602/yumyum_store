<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            'name' => 'YumYum - Trần Khất Chân',
            'description' => 'Số 434, Trần Khất Chân, Hà Nội',
            'address' => 'Số 434, Trần Khất Chân, Hà Nội',
            'phone' => '0372505286',
            'avatar' => 'pizza.jpg',
            'workspace_id' => 1,
        ]);
        DB::table('stores')->insert([
            'name' => 'YumYum - Linh Đàm',
            'description' => 'Kiot 28, Khu đô thị Linh Đàm, Hà Nội',
            'address' => 'Kiot 28, Khu đô thị Linh Đàm, Hà Nội',
            'phone' => '03786333414',
            'avatar' => 'banh_ngot.jpg',
            'workspace_id' => 1,
        ]);
    }
}
