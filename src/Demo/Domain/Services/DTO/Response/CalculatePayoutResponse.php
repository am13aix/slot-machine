<?php


namespace Demo\Domain\Services\DTO\Response;


use App\Services\DTO\Response\ResponseInterface;

class CalculatePayoutResponse implements ResponseInterface
{
    /** @var array */
    private $gridWithRowPayout=[];

    /**
     * CalculatePayoutResponse constructor.
     *
     * @param array $gridWithRowPayout
     */
    public function __construct(array $gridWithRowPayout)
    {
        $this->gridWithRowPayout = $gridWithRowPayout;
    }

    /**
     * @return array
     */
    public function getGridWithRowPayout(): array
    {
        return $this->gridWithRowPayout;
    }


}