<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Name',
            'email' => 'manager@manager.com',
            'password' => bcrypt('manager'),
            'role' => 'manager'
        ]);
    }
}
