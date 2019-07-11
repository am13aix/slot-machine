<?php
/**
 * Created by PhpStorm.
 * User: andrew.magri
 * Date: 11/07/2019
 * Time: 14:08
 */

namespace Demo\Domain\Repositories;


interface TransactionRepositoryInterface
{
    public function insertTransaction(array $spinResult, $currency, $betAmount, $payoutPercentage, $winAmount);

}