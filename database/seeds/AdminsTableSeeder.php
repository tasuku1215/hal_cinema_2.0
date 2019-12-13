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
                'login_id' => 'admin',
                'name' => 'アドミンリン',
                'password' => 'password',
                'auth' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'status' => 1
            ],
        ]);
    }
}
