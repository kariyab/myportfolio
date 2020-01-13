<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\User;
use App\Policies\UserPolicy;
use App\Post;
use App\Policies\PostPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        //User::class => UserPolicy::class,
        //Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 開発者のみ許可
        Gate::define('system-only', function ($user) {
        return ($user->role == 1);
        });
        // 管理者以上（管理者＆システム管理者）に許可
        Gate::define('admin-higher', function ($user) {
        return ($user->role > 0 && $user->role <= 5);
        });
        // 一般ユーザ以上（全員）に許可
        Gate::define('user-higher', function ($user) {
        return ($user->role > 0 && $user->role <= 10);
        });
        
        //投稿者に許可
        Gate::define('edit', 'update', 'delete', function ($user, $bbs) {
            return $user->id == $bbs->user_id;
        });
        
    }
    
}