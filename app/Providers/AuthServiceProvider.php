<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

          // define a admin user role 
          Gate::define('owner', function($user) {
            return $user->level == 'admin';
         });
        
         //define a author user level 
         Gate::define('author', function($user) {
             return $user->level == 'author';
         });
       
         // define a editor level 
         Gate::define('isEditor', function($user) {
             return $user->level == 'editor';
         });
        //
    }
}
