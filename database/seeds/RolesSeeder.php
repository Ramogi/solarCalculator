<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = Role::create([
            'name' => 'Author', 
            'slug' => 'author',
            'permissions' =>json_encode([
                'create-post' => true,
                'update-post' => true,
            ]),
        ]);
        $editor = Role::create([
            'name' => 'Editor', 
            'slug' => 'editor',
            'permissions' =>json_encode([
                'update-post' => true,
                'delete-post' => true,
                'delete-service' => true,
                'update-service' => true,
                'update-installer' => true,
                'delete-installer' => true,
            ]),
        ]);

        $installer = Role::create([
            'name' => 'Installer', 
            'slug' => 'installer',
            'permissions' =>json_encode([
                'create-post' => true,
                'update-post' => true,
                'create-installer' => true,
                'update-installer' => true,
                'create-service' => true,
                'update-service' => true,
            ]),
        ]);
    }
}
