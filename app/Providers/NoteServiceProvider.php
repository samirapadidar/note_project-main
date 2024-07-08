<?php

namespace App\Providers;

use App\Repositories\Interfaces\NoteRepositoryInterface;
use App\Services\Interfaces\NoteServiceInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\NoteRepository;
use App\Services\NoteService;

class NoteServiceProvider extends ServiceProvider
{

    /**
     * Register The Service Provider.
     * @return void
     */
    public function register()
    {
        $this->app->bind(NoteRepositoryInterface::class, NoteRepository::class);
        $this->app->bind(NoteServiceInterface::class, NoteService::class);
    }
    /**
     * Get The Services Provided By The Provider.
     * @return array
     */
    public function provides()
    {
        return [NoteRepositoryInterface::class, NoteServiceInterface::class];
    }
}
