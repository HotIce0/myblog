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
            'name' => 'saoguang',
            'email' => 'saoguang@vip.qq.com',
            'password' => bcrypt('Zengguang577X...'),
        ]);
    }
}
