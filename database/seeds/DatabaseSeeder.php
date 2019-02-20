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
             //enable back fk constrain check
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
        // $this->call(UsersTableSeeder::class);
        $this->call(RolesSeeder::class);
    }
    
}
