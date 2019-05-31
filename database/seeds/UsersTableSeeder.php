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
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'is_admin' => 1,
                'password'=>'$2y$10$oU.R6QBxtOn1RXsYfishUOO3nd41kl1M1JgjS9lseIBT20l0M9'
            ]
        ]);
    }
}
