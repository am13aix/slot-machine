<?php


namespace App\Providers;

use Demo\Domain\Repositories\TransactionRepositoryInterface;
use Demo\Infrastructure\Repositories\TransactionRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Provider class to register transaction service
 */
class TransactionServiceProvider extends ServiceProvider
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

    }

    /**
     * binds interfaces
     */
    private function bindInterfaces() {
        $this->app->bind(
            TransactionRepositoryInterface::class,
            TransactionRepository::class
        );
    }
}