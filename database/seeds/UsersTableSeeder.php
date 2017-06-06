<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::table('role_user')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $users = [
            [
                'name' => 'Barrie Beheerder',
                'email' => 'test@test.nl',
                'password' => bcrypt('123456'),
                'roles' => ['employee']
            ]
        ];

        foreach ($users as $user) {
            $roles = $user['roles'];
            unset($user['roles']);

            $this->command->info('[ Users ] creating: ' . $user['email']);
            $user = User::create($user);

            foreach ($roles as $name) {
                $role = Role::where('name', $name)->first();
                $user->attachRole($role);
            }
        }
    }
}
