<?php


namespace Demo\Infrastructure\Repositories;


use Demo\Domain\Repositories\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface
{

    public function insertTransaction(array $spinResult, $currency, $betAmount, $payoutPercentage, $winAmount)
    {
        // TODO: Implement insertTransaction() method.
    }
}