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
          'name' => 'admin@gmail.com',
          'email' => 'admin@gmail.com',
          'password' => md5('admin'),
          'remember_token' => 1
      ]);
    }
}
