<?php

namespace App\Providers;

use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Services\Interfaces\TagServiceInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\TagRepository;
use App\Services\TagService;

class TagServiceProvider extends ServiceProvider
{

    /**
     * Register The Service Provider.
     * @return void
     */
    public function register()
    {
        $this->app->bind(TagRepositoryInterface::class, TagRepository::class);
        $this->app->bind(TagServiceInterface::class, TagService::class);
    }
    /**
     * Get The Services Provided By The Provider.
     * @return array
     */
    public function provides()
    {
        return [TagRepositoryInterface::class, TagServiceInterface::class];
    }
}
