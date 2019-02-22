<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Post;
use App\Service;
use App\Installer;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerPostPolicies();
        $this->registerServicePolicies();
        $this->registerInstallerPolicies();

        //
    }

    public function registerInstallerPolicies()
    {
      Gate::define('create-installer', function($user){
        return $user->hasAccess(['create-installer']);
      });

      Gate::define('update-installer', function($user, \App\Installer $installer){
        return $user->hasAccess(['update-installer']) or $user ->id ==$installer -> user_id;
      });

      Gate::define('edit-installer', function($user, \App\Installer $installer){
        return $user->hasAccess(['edit-installer']) or $user ->id ==$installer -> user_id;
      });

      Gate::define('delete-installer', function($user, \App\Installer $installer){
        return $user->hasAccess(['delete-installer']) or $user ->id ==$installer -> user_id;
      });
    }

    public function registerServicePolicies()
    {
      Gate::define('create-service', function($user){
        return $user->hasAccess(['create-service']);
      });

      Gate::define('update-service', function($user, \App\Service $service){
        return $user->hasAccess(['update-service']) or $user ->id ==$service -> user_id;
      });

      Gate::define('edit-service', function($user, \App\Service $service){
        return $user->hasAccess(['edit-service']) or $user ->id ==$service -> user_id;
      });

      Gate::define('delete-service', function($user, \App\Service $service){
        return $user->hasAccess(['delete-service']) or $user ->id ==$service -> user_id;
      });
    }


    public function registerPostPolicies()
    {
      Gate::define('create-post', function($user){
        return $user->hasAccess(['create-post']);
      });

      Gate::define('update-post', function($user, \App\Post $post){
        return $user->hasAccess(['update-post']) or $user ->id ==$post -> user_id;
      });

      Gate::define('edit-post', function($user, \App\Post $post){
        return $user->hasAccess(['edit-post']) or $user ->id ==$post -> user_id;
      });

      Gate::define('delete-post', function($user, \App\Post $post){
        return $user->hasAccess(['delete-post']) or $user ->id ==$post -> user_id;
      });
    }
}
