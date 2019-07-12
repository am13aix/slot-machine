<?php


namespace Demo\Domain\Services\DTO\Request;


use App\Services\DTO\Request\RequestInterface;

class CalculatePayoutRequest implements RequestInterface
{
    /** @var array */
    private $grid=[];

    /**
     * CalculatePayoutRequest constructor.
     *
     * @param array $grid
     */
    public function __construct(array $grid)
    {
        $this->grid = $grid;
    }


    /**
     * @return array
     */
    public function getGrid(): array
    {
        return $this->grid;
    }




}