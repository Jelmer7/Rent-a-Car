<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EntrustPermissionsSeeder::class);
        $this->call(EntrustRolesSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
