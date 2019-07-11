<?php


namespace Demo\Application\Services\DTO\Request;


use App\Services\DTO\Request\RequestInterface;

class SpinRequest implements RequestInterface
{
    private $amount = 0;
    private $currency = '';

    /**
     * SpinRequest constructor.
     *
     * @param string $currency Currency Code
     * @param int $amount Amount of spin in cents
     */
    public function __construct(string $currency , int $amount)
    {
        $this->amount = $amount;
        $this->currency = $currency;
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


}