<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');
        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear all old data ?')) {
            // Call the php artisan migrate:refresh
            $this->command->call('migrate:refresh');
            //$this->command->call('migrate:refresh --path=/database/migrations/2014_10_12_000000_create_users_table.php');
            $this->command->warn("Data cleared, starting from blank database.");
        }

        // Create an "admin" role
        $adminRole = Role::create(['name' => 'admin']);

        // Create a dummy user
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin@123'),
            'phone_number' => 9823728193,
        ]);

        // Assign the "admin" role to the user
        $user->assignRole($adminRole);
    }
}
