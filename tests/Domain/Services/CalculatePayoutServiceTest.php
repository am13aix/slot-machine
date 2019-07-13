<?php


namespace Test\Domain\Services;


use Demo\Domain\Models\PayoutRowInformation;
use Demo\Domain\Services\CalculatePayoutService;
use Demo\Domain\Services\DTO\Request\CalculatePayoutRequest;
use Demo\Domain\Services\DTO\Response\CalculatePayoutResponse;
use Test\TestCase;

class CalculatePayoutServiceTest extends TestCase
{
    private $grid = [
        ['9','9','9','9','9'],
        ['9','B','9','0','J'],
        ['9','M','M','M','M'],
    ];

    private $printableGrid = [
        ['9','9','9','9','9'],
        ['9','BIR','9','0','J'],
        ['9','MON','MON','MON','MON'],
    ];

    /** @var CalculatePayoutRequest $serviceRequest */
    private $serviceRequest;

    /** @var CalculatePayoutService $service */
    private $service;

    /** @var CalculatePayoutResponse $serviceResponse */
    private $serviceResponse;

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        $this->serviceRequest = new CalculatePayoutRequest($this->grid,$this->printableGrid);
        $this->service = new CalculatePayoutService();
        $this->serviceResponse = $this->service->execute($this->serviceRequest);

        parent::__construct($name, $data, $dataName);
    }

    public function testTotalPayoutPercentage(){

        //assert all 3 rows
        /** @var PayoutRowInformation $row0 */
        $row0 = $this->serviceResponse->getGridWithRowPayout()[0];
        $this->assertEquals($row0->getPayoutPercentage(),1000);
        $this->assertEquals(json_encode($row0->getRow()),json_encode($this->grid[0]));
        $this->assertEquals(json_encode($row0->getPrintableRow()),json_encode($this->printableGrid[0]));
        $this->assertEquals(json_encode($row0->getPayLines()),json_encode([[1,4,7,10,13],[0,4,8,10,12]]));


        /** @var PayoutRowInformation $row1 */
        $row1 = $this->serviceResponse->getGridWithRowPayout()[1];
        $this->assertEquals($row1->getPayoutPercentage(),0);
        $this->assertEquals(json_encode($row1->getRow()),json_encode($this->grid[1]));
        $this->assertEquals(json_encode($row1->getPrintableRow()),json_encode($this->printableGrid[1]));
        $this->assertEquals(json_encode($row1->getPayLines()),json_encode([]));

        /** @var PayoutRowInformation $row2 */
        $row2 = $this->serviceResponse->getGridWithRowPayout()[2];
        $this->assertEquals($row2->getPayoutPercentage(),200);
        $this->assertEquals(json_encode($row2->getRow()),json_encode($this->grid[2]));
        $this->assertEquals(json_encode($row2->getPrintableRow()),json_encode($this->printableGrid[2]));
        $this->assertEquals(json_encode($row2->getPayLines()),json_encode([[0,4,8,10,12]]));

        $this->assertEquals($this->serviceResponse->getTotalPayoutPercentage(), '1200');
    }
}