<?php


namespace Demo\Application\Services\DTO\Response;

use App\Services\DTO\Response\ResponseInterface;

/**
 * Class SpinResponse
 *
 * @package Demo\Application\Services\DTO\Response
 */
class SpinResponse implements ResponseInterface
{
    /**
     * @var int
     */
    private $payoutPercentage = 0;
    /**
     * @var array
     */
    private $gridResult = [];
    /**
     * @var array
     */
    private $printableGridResult = [];

    /**
     * SpinRequest constructor.
     *
     * @param int $payoutPercentage The total payout percentage that calculated the win
     * @param array $gridResult The final grid combination and payout information
     */
    public function __construct(array $gridResult, int $payoutPercentage)
    {
        $this->payoutPercentage = $payoutPercentage;
        $this->gridResult = $gridResult;

    }

    /**
     * @return int
     */
    public function getPayoutPercentage(): int
    {
        return $this->payoutPercentage;
    }

    /**
     * @return array
     */
    public function getGridResult(): array
    {
        return $this->gridResult;
    }

    /**
     * @return array
     */
    public function getPrintableGridResult(): array
    {
        return $this->printableGridResult;
    }

}