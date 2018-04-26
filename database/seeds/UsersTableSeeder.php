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
          'name' => 'Administrator',
          'email' => 'admin@gmail.com',
          'password' => md5('admin'),
          'group_id' => 1,
          'birthday' => '1990/01/01',
          'phone'    => '0963551594',
          'location' => 'ND',
          'certificate' => 'DH',
          'image'    => 'avatar.png',
          'remember_token' => 1
      ]);
      // DB::table('users')->insert([
      //       'name' => str_random(10),
      //       'email' => str_random(10).'@gmail.com',
      //       'password' => md5('secret'),
      //       'group_id' => str_random(10),
      //       'phone' => str_random(10),
      //       'location' => str_random(10),
      //       'certificate' => str_random(10),
      //       'image' => str_random(10),
      //       'remember_token' => str_random(10)
      //   ]);
    }
}
