<?php

use Illuminate\Database\Seeder;
use App\Permission;

class EntrustPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $permissions = [
            [
                'name' => 'rent',
                'display_name' => 'Auto\'s huren',
                'description' => 'Auto\'s kunnen huren'
            ],
            [
                'name' => 'daylist',
                'display_name' => 'Dag lijst',
                'description' => 'Dag lijst kunnen inzien'
            ],
            [
                'name' => 'cars.create',
                'display_name' => 'Auto\'s toevoegen',
                'description' => 'Nieuwe auto\'s kunnen toevoegen'
            ],
            [
                'name' => 'cars.edit',
                'display_name' => 'Auto\'s bewerken',
                'description' => 'Bestaande auto\'s kunnen bewerken'
            ],
            [
                'name' => 'cars.delete',
                'display_name' => 'Auto\'s verwijderen',
                'description' => 'Auto\'s kunnen verwijderen'
            ],
            [
                'name' => 'users.index',
                'display_name' => 'Gebruikers bekijken',
                'description' => 'Bestaande gebruikers kunnen bewerken'
            ],
            [
                'name' => 'users.create',
                'display_name' => 'Gebruikers toevoegen',
                'description' => 'Nieuwe gebruikers kunnen toevoegen'
            ],
            [
                'name' => 'users.edit',
                'display_name' => 'Gebruiker bewerken',
                'description' => 'Bestaande gebruikers kunnen bewerken'
            ],
            [
                'name' => 'users.delete',
                'display_name' => 'Gebruikers verwijderen',
                'description' => 'Gebruikers kunnen verwijderen'
            ],
            [
            'name' => 'booking.delete',
            'display_name' => 'Booking verwijderen',
            'description' => 'Het verwijderen van een booking'
            ],
        ];

        foreach ($permissions as $permission) {
            $this->command->info('[ Permissions ] creating: ' . $permission['display_name']);
            Permission::create($permission);
        }
    }
}
