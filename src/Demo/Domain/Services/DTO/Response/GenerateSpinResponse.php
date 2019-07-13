<?php


namespace Demo\Domain\Services\DTO\Response;


use App\Services\DTO\Response\ResponseInterface;

/**
 * Class GenerateSpinResponse
 *
 * @package Demo\Domain\Services\DTO\Response
 */
class GenerateSpinResponse implements ResponseInterface
{
    /** @var array grid symbols */
    private $grid=[];
    /** @var array grid with printable symbols */
    private $printableGrid=[];

    /**
     * GenerateSpinResponse constructor.
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