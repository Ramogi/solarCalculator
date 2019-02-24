<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $design = Service::create([
            'name' => 'Design', 
        ]);

        $development = Service::create([
            'name' => 'Development', 
        ]);

        $instal = Service::create([
            'name' => 'Installation', 
        ]);

        $leasing = Service::create([
            'name' => 'Leasing', 
        ]);

        $sales = Service::create([
            'name' => 'Sales and Service', 
        ]);

        $projectmgt = Service::create([
            'name' => 'Project Management', 
        ]);        
    }
}
