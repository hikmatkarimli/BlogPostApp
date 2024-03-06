<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\BlogPostPolicy;
use App\Models\BlogPost;
use App\Models\User;
use App\Policies\UserPolicy;
use App\Policies\CommentPolicy;
use App\Models\Comment;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        BlogPost::class => BlogPostPolicy::class,
        User::class => UserPolicy::class,
        Comment::class => CommentPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('home.secret', function ($user) {
            return $user->is_admin;
        });

        // Gate::define('update-post', function ($user, $post) {
        //     return $user->id == $post->user_id;
        // });

        // Gate::define('delete-post', function ($user, $post) {
        //     return $user->id == $post->user_id;
        // });

        Gate::before(function ($user, $ability) {
            if ($user->is_admin && in_array($ability, ['update', 'delete'])) {
                return true;
            }
        });
        // Gate::resource('posts', BlogPostPolicy::class);
    }
}
