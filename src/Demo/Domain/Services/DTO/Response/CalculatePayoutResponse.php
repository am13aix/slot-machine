<?php


namespace Demo\Domain\Services\DTO\Response;


use App\Services\DTO\Response\ResponseInterface;

class CalculatePayoutResponse implements ResponseInterface
{
    /** @var array */
    private $gridWithRowPayout=[];

    private $totalPayoutPercentage = 0;

    /**
     * CalculatePayoutResponse constructor.
     *
     * @param array $gridWithRowPayout
     * @param int   $totalPayoutPercentage
     */
    public function __construct(array $gridWithRowPayout, int $totalPayoutPercentage)
    {
        $this->gridWithRowPayout = $gridWithRowPayout;
        $this->totalPayoutPercentage = $totalPayoutPercentage;
    }

    /**
     * @return array
     */
    public function getGridWithRowPayout(): array
    {
        return $this->gridWithRowPayout;
    }

    /**
     * @return int
     */
    public function getTotalPayoutPercentage(): int
    {
        return $this->totalPayoutPercentage;
    }




}