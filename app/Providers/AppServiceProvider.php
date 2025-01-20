<?php

namespace App\Providers;

use App\Contracts\ProfileServiceInterface;
use App\Services\MongoProfileService;
use App\Services\ParseProfileService;
use Illuminate\Support\ServiceProvider;
use Parse\ParseClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        $this->app->bind(ProfileServiceInterface::class, function () {
            if (config('app.env') === 'local') {
                return app(MongoProfileService::class);
            }

            ParseClient::initialize(
                config('back4app.app_id'),
                config('back4app.client_id'),
                config('back4app.master_id'),
            );
            ParseClient::setServerURL(config('back4app.server_url'), '/');
            
            return app(ParseProfileService::class);
        });
    }
}
