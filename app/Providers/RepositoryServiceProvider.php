<?php

namespace App\Providers;

use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\SchoolClassRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\SchoolClass;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\Repositories\SchoolClassRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(SchoolClassRepositoryInterface::class, SchoolClassRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}
}
