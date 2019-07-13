<?php

namespace Test\Domain\Services\DTO\Request;

use Demo\Domain\Services\DTO\Request\CalculatePayoutRequest;
use Test\TestCase;

class CalculatePayoutRequestTest extends TestCase
{
    //valid params
    private $grid = [[1,3,4,5,6], [1,3,4,5,6]];
    private $printableGrid = [[1,3,4,5,6], [1,3,4,5,6]];

    public function testEmptyGridValidation(){
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionCode(50001);
        $request = new CalculatePayoutRequest([],$this->printableGrid);
    }

    public function testEmptyPrintableGridValidation(){
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionCode(50002);
        $request = new CalculatePayoutRequest($this->grid, []);
    }

    public function testValidationSuccessful(){
        $request = new CalculatePayoutRequest($this->grid, $this->printableGrid);
        $this->assertEquals(json_encode($request->getGrid()), json_encode($this->grid));
        $this->assertEquals(json_encode($request->getPrintableGrid()), json_encode($this->printableGrid));
    }
}