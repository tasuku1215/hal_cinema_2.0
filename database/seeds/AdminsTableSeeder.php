<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('admins')->insert([
        [
          'admin_id' => '1',
          'login_id' => '10001',
          'name' => '山田太郎',
          'password' => 'hogehoge',
          'created_at' => new DateTime(),
          'updated_at' => new DateTime(),
        ],
      ]);
    }
}
