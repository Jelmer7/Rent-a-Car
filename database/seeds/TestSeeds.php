<?php

use Illuminate\Database\Seeder;
use app\User;
use app\Role;

class TestSeeds extends Seeder
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
                'initials' => 'T.',
                'insertion' => '',
                'surname' => 'Test',
                'email' => 'test@test.nl',
                'password' => bcrypt('123456'),
                'address' => 'Teststraat 1',
                'postal_code' => '7751 TT',
                'residence' => 'Teststad',
                'roles' => ['employee']
            ],
            [
                'initials' => 'K.',
                'insertion' => '',
                'surname' => 'Klant',
                'email' => 'klant@test.nl',
                'password' => bcrypt('123456'),
                'address' => 'Klantstraat 2',
                'postal_code' => '7751 KL',
                'residence' => 'Teststad',
                'roles' => ['customer']
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
