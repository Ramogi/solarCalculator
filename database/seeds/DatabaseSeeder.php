<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

      if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear all old data ?')) {
            // disable fk constrain check
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            // Call the php artisan migrate:refresh
            $this->command->call('migrate:refresh');
            $this->command->warn("Data cleared, starting from blank database.");

            factory(App\User::class, 5)->create();
        // $this->call(UsersTableSeeder::class);
        $this->call(RolesSeeder::class);

        // Posts Seeder 
        factory(\App\Post::class, 30)->create();
        $this->command->info('Some Posts data seeded.');

        // Installer Seeder 
        factory(\App\Installer::class, 30)->create();
        $this->command->info('Some Installer data seeded.');
        $this->command->warn('All done :)');
             //enable back fk constrain check
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }


    }
    
}
