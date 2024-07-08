<?php

namespace App\Providers;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Services\Interfaces\CategoryServiceInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Services\CategoryService;

class CategoryServiceProvider extends ServiceProvider
{

    /**
     * Register The Service Provider.
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
    }
    /**
     * Get The Services Provided By The Provider.
     * @return array
     */
    public function provides()
    {
        return [CategoryRepositoryInterface::class, CategoryServiceInterface::class];
    }
}
