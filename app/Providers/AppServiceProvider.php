<?php

namespace App\Providers;

use App\Services\Impl\PlayerServiceImpl;
use App\Services\PlayerService;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use App\Services\Impl\GameServiceImpl;
use App\Services\GameService;

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
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(
                $request->user()?->id ?: $request->ip()
            );
        });

        $this->app->bind(
            GameService::class,
            GameServiceImpl::class,
        );

        $this->app->bind(
            PlayerService::class,
            PlayerServiceImpl::class,
        );
    }
}
