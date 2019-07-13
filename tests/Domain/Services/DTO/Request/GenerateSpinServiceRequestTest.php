<?php


namespace Test\Domain\Services\DTO\Request;


use Demo\Domain\Services\DTO\Request\GenerateSpinRequest;
use Test\TestCase;

class GenerateSpinServiceRequestTest extends TestCase
{

    //valid params
    private $columnCount=5;
    private $rowCount=3;

    public function testNotPositiveColumnsValidation(){
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionCode(20001);
        $request = new GenerateSpinRequest(0,$this->rowCount);
    }

    public function testNotPositiveRowsValidation(){
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionCode(20002);
        $request = new GenerateSpinRequest($this->columnCount, 0);
    }

    public function testValidationSuccessful(){
        $request = new GenerateSpinRequest($this->columnCount, $this->rowCount);
        $this->assertEquals($request->getRowCount(), $this->rowCount);
        $this->assertEquals($request->getColumnCount(), $this->columnCount);
    }
}