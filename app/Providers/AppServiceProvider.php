<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Guest Limit
     * @var int
     */
    public $guestLimit = 3;

    /**
     * Logged In User Limit
     * @var int
     */
    public $userLimit = 10;

    /**
     * Premium User Limit
     * @var int
     */
    public $premiumLimit = 100;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();
    }

    /**
     * Configure the rate limiters for the application.
     * 
     * Limits submissions through the 'sentiment' throttle based
     * on account / guest status.
     */
    protected function configureRateLimiting(): void
    {

        RateLimiter::for('sentiment', function (Request $request) {
            return $request->user()
                ? Limit::perMinute($this->userLimit)->by($request->user()->id)
                : Limit::perMinute($this->guestLimit)->by($request->ip());
        });
    }
}
