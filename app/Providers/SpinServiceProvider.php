<?php


namespace App\Providers;

use Demo\Domain\Services\CalculatePayoutService;
use Demo\Domain\Services\CalculatePayoutServiceInterface;
use Demo\Domain\Services\GenerateSpinService;
use Demo\Domain\Services\GenerateSpinServiceInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Provider class to register spin service and its dependencies
 */
class SpinServiceProvider extends ServiceProvider
{
    public function register()
    {
        //specify which implementation to be used per Interface, giving flexibility
        $this->app->bind(GenerateSpinServiceInterface::class, GenerateSpinService::class);
        $this->app->bind(CalculatePayoutServiceInterface::class, CalculatePayoutService::class);

    }
}