<?php


namespace Demo\Domain\Services\DTO\Request;


use App\Services\DTO\Request\RequestInterface;

/**
 * Class CalculatePayoutRequest
 *
 * @package Demo\Domain\Services\DTO\Request
 */
class CalculatePayoutRequest implements RequestInterface
{
    /** @var array grid with symbols */
    private $grid=[];
    /** @var array grid with printable symbols */
    private $printableGrid;

    /**
     * CalculatePayoutRequest constructor.
     *
     * @param array $grid
     * @param array $printableGrid
     */
    public function __construct(array $grid, array $printableGrid)
    {
        $this->grid = $grid;
        $this->printableGrid = $printableGrid;
    }


    /**
     * @return array
     */
    public function getGrid(): array
    {
        return $this->grid;
    }

    /**
     * @return array
     */
    public function getPrintableGrid(): array
    {
        return $this->printableGrid;
    }

}