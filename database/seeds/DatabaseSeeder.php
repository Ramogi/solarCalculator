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
            //$this->call(UsersTableSeeder::class);
              $this->call(RolesSeeder::class);
              $this->command->info('Some Roles seeded.');

              // Posts Seeder 
            factory(\App\Post::class, 30)->create();
              $this->command->info('Some Posts  seeded.');

              $this->call(ServicesSeeder::class);
              $this->command->info('Some Services seeded.');

              // Installer Seeder 
              factory(\App\Installer::class, 30)->create();
              $this->command->info('Some Installer data seeded.');

              // Installer_Services Seeder

              $services = App\Service::all();

              App\Installer::all()->each(function ($installer) use ($services) { 
                  $installer->services()->attach(
                      $services->random(rand(1, 5))->pluck('id')->toArray()
                  ); 
              });

              $this->command->info('Services attached to intsllers');


              // User RolesSeeder
              $roles = App\Role::all();

              App\User::All()->each(function ($user) use ($roles){
                    $user->roles()->saveMany($roles);
                });

              $this->command->info('Roles attached to users');

              $this->command->warn('All done :)');
             //enable back fk constrain check
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }


    }
    
}
