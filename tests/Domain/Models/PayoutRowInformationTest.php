<?php


namespace Test\Domain\Models;


use Demo\Domain\Models\PayoutRowInformation;
use Test\TestCase;

class PayoutRowInformationTest extends TestCase
{
    //valid params
    private $row = [1,3,4,5,6];
    private $printableRow = [1,3,4,5,6];
    private $payoutPercentage = 10;

    public function testEmptyRowValidation(){
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionCode(40001);
        $request = new PayoutRowInformation([],$this->printableRow, [],[],$this->payoutPercentage);
    }

    public function testEmptyPrintableRowValidation(){
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionCode(40002);
        $request = new PayoutRowInformation($this->row,[], [],[],$this->payoutPercentage);
    }

    public function testNegativePayoutPercentageValidation(){
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionCode(40003);
        $request = new PayoutRowInformation($this->row,$this->printableRow, [],[],-10);
    }

    public function testValidationSuccessful(){
        $request = new PayoutRowInformation($this->row,$this->printableRow, [],[],$this->payoutPercentage);
        $this->assertEquals(json_encode($request->getRow()), json_encode($this->row));
        $this->assertEquals(json_encode($request->getPrintableRow()), json_encode($this->printableRow));
        $this->assertEquals($request->getPayoutPercentage(), $this->payoutPercentage);
    }
}