<?php

namespace App\Providers;

use App\Application\Factories\FeedbackProcessorFactory;
use App\Application\Interfaces\IFeedbackProcessorFactory;
use App\Application\Interfaces\IFeedbackService;
use App\Domain\Services\FeedbackService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IFeedbackService::class, function() {
            return new FeedbackService();
        });

        $this->app->bind(IFeedbackProcessorFactory::class, function () {
            return new FeedbackProcessorFactory();
        });

        //$this->app->bind(Ш::class, ImplementationsGoogleDriveImageManagement::class);
        //$this->app->bind(IFeedbackService::class, FeedbackService::class);
        //$this->app->bind(IFeedbackProcessorFactory::class, FeedbackProcessorFactory::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
