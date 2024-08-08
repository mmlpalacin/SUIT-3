<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Role;
use App\Actions\Fortify\CreateNewUser;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(CreateNewUser::class);
    }

    public function boot(): void
    {
        View::composer('auth.register', function ($view) {
            $roles = role::all();
            $view->with('roles', $roles);
        });
    }
}
