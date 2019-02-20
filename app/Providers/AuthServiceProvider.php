<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
      //  'App\Model' => 'App\Policies\ModelPolicy',
        'App\Post' => 'App\Policies\ProjectPolicy',
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

        //
    }

    public function registerPostPolicies()
    {
      Gate::define('create-post', function($user){
        $user->hasAccess(['create-post']);
      });

      Gate::define('update-post', function($user, \App\Post $post){
        $user->hasAccess(['update-post']) or $user ->id ==$post -> user_id;
      });

      Gate::define('delete-post', function($user, Post $post){
        $user->hasAccess(['delete-post']) or $user ->id ==$post -> user_id;
      });
    }
}
