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
     * @param int    $amount Amount of spin in cents
     * @throws \Exception
     */
    public function __construct(string $currency , int $amount)
    {
        //validate the request abides to the contract rules
        If (!in_array($currency, ['EUR', 'GBP', 'USD'])){
            throw new \Exception('Currency Code must be either EUR, GBP, USD', 10001);
        }
        $this->currency = $currency;

        If ($amount <=0){
            throw new \Exception('Amount must be greater than 0', 10002);
        }
        $this->amount = $amount;
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