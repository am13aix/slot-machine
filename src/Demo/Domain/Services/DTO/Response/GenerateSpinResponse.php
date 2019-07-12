<?php


namespace Demo\Domain\Services\DTO\Response;


use App\Services\DTO\Response\ResponseInterface;

class GenerateSpinResponse implements ResponseInterface
{
    /** @var array */
    private $grid=[];

    /**
     * GenerateSpinResponse constructor.
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