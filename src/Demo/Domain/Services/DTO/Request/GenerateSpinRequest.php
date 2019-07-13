<?php

namespace Demo\Domain\Services\DTO\Request;

use App\Services\DTO\Request\RequestInterface;

/**
 * Class GenerateSpinRequest
 *
 * @package Demo\Domain\Services\DTO\Request
 */
class GenerateSpinRequest implements RequestInterface
{
    /** @var int total amount of columns*/
    private $columnCount=0;

    /** @var int total amount of rows*/
    private $rowCount=0;


    /**
     * GenerateSpinRequest constructor.
     *
     * @param int $columnCount
     * @param int $rowCount
     * @throws \Exception
     */
    public function __construct(int $columnCount, int $rowCount)
    {
        //validate the amounts are in positive
        If ($columnCount <=0){
            throw new \Exception('Column count should be greater than 0', 20001);
        }
        $this->columnCount = $columnCount;

        If ($rowCount <=0){
            throw new \Exception('Row count should be greater than 0', 20001);
        }
        $this->rowCount = $rowCount;
    }

    /**
     * @return int
     */
    public function getColumnCount(): int
    {
        return $this->columnCount;
    }

    /**
     * @return int
     */
    public function getRowCount(): int
    {
        return $this->rowCount;
    }



}