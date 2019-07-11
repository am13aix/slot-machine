<?php


namespace Demo\Application\Services\DTO\Request;

use App\Services\DTO\Request\ResponseInterface;

class SpinResponse implements ResponseInterface
{
    private $amount = 0;
    private $currency = '';
    private $payoutPercentage = 0;

    /**
     * SpinRequest constructor.
     *
     * @param string $currency Currency Code
     * @param int $amount The total amount won in cents
     * @param int $payoutPercentage The total payout percentage that calculated the win
     */
    public function __construct(string $currency , int $amount, int $payoutPercentage)
    {
        $this->amount = $amount;
        $this->currency = $currency;
        $this->payoutPercentage = $payoutPercentage;
    }


    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }


    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getPayoutPercentage(): int
    {
        return $this->payoutPercentage;
    }


}