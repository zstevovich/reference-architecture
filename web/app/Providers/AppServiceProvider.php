<?php declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Architecture\Domain\Repositories\DeveloperRepositoryInterface','Architecture\Infrastructure\DataAccess\Repositories\DeveloperRepository');
        $this->app->bind('Architecture\Domain\Services\SendMailServiceInterface','Architecture\Infrastructure\Services\SendMailService');
        $this->app->bind('Architecture\Api\Contracts\ServiceInterfaces\DeveloperServiceInterface','Architecture\ApplicationServices\DeveloperService');
        $this->app->bind('Architecture\BuildingBlocks\RepositoryInterface','Architecture\Infrastructure\DataAccess\Repositories\BaseRepository');
        $this->app->bind('Architecture\BuildingBlocks\UnitOfWorkRepositoryInterface','Architecture\Infrastructure\DataAccess\UnitOfWork');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
