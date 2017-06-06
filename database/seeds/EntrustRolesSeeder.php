<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class EntrustRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        DB::table('permission_role')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $roles = [
            [
                'name' => 'employee',
                'display_name' => 'Medewerker',
                'description' => 'Medewerker die de daglijst kan inzien.',
                'permissions' => ['daylist',
                    'cars.index', 'cars.create', 'cars.edit', 'cars.delete',
                    'users.index', 'users.create', 'users.edit', 'users.delete']
            ],
            [
                'name' => 'customer',
                'display_name' => 'Klant',
                'description' => 'Geregistreerde klant die het huursysteem kan gebruken.',
                'permissions' => ['rent', 'profile']
            ]
        ];

        foreach ($roles as $role) {
            $permissions = $role['permissions'];
            unset($role['permissions']);

            $this->command->info('[ Roles ] Creating: ' . $role['display_name']);
            $role = Role::create($role);

            foreach ($permissions as $permission_name) {
                // Set the permissions
                $permission = Permission::where('name', $permission_name)->first();
                $role->attachPermission($permission);
            }
        }
    }
}
