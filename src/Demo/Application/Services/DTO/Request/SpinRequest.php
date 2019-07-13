<?php


namespace Demo\Application\Services\DTO\Request;

use App\Services\DTO\Request\RequestInterface;

/**
 * Class SpinRequest
 *
 * @package Demo\Application\Services\DTO\Request
 */
class SpinRequest implements RequestInterface
{
    /**
     * @var int
     */
    private $amount = 0;
    /**
     * @var string
     */
    private $currency = '';

    /**
     * SpinRequest constructor.
     *
     * @param string $currency Currency Code
     * @param int    $amount Amount of spin in cents
     * @throws \InvalidArgumentException
     */
    public function __construct(string $currency , int $amount)
    {
        //validate the request abides to the contract rules
        If (!in_array($currency, ['EUR', 'GBP', 'USD'])){
            throw new \InvalidArgumentException('Currency Code must be either EUR, GBP, USD', 10001);
        }
        $this->currency = $currency;

        If ($amount <=0){
            throw new \InvalidArgumentException('Amount must be greater than 0', 10002);
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