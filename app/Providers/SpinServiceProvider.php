<?php


namespace App\Providers;

use Demo\Application\Services\SpinService;
use Demo\Domain\Repositories\TransactionRepositoryInterface;
use Demo\Domain\Services\CalculatePayoutService;
use Demo\Domain\Services\CalculatePayoutServiceInterface;
use Demo\Domain\Services\GenerateSpinService;
use Demo\Domain\Services\GenerateSpinServiceInterface;
use Demo\Infrastructure\Repositories\TransactionRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Provider class to register spin service and its dependencies
 */
class SpinServiceProvider extends ServiceProvider
{
    /**
     * binds interfaces and boots services after all providers have been registered
     *
     * @return void
     */
    public function boot() {
        $this->bindInterfaces();
        $this->bootServices();
    }


    private function bootServices()
    {
        //generate and inject the dependencies for the spin service
        $generateSpinService = new GenerateSpinService();
        $calculateSpinService = new CalculatePayoutService();

        $this->app->bind(SpinService::class,
            function () use ($generateSpinService,$calculateSpinService) {
                return new SpinService($generateSpinService,$calculateSpinService);
            }
        );

    }

    /**
     * binds interfaces
     */
    private function bindInterfaces() {
//        $this->app->bind(CalculatePayoutServiceInterface::class,CalculatePayoutService::class);
////        $this->app->bind(GenerateSpinServiceInterface::class,GenerateSpinService::class);
//        $this->app->bind(TransactionRepositoryInterface::class,TransactionRepository::class);
    }
}