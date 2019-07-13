<?php


namespace Test\Domain\Services;


use Demo\Domain\Services\DTO\Request\GenerateSpinRequest;
use Demo\Domain\Services\DTO\Response\GenerateSpinResponse;
use Demo\Domain\Services\GenerateSpinService;

use Test\TestCase;

class GenerateSpinServiceTest extends TestCase
{
    //valid params
    private $columnCount=5;
    private $rowCount=3;

    /** @var GenerateSpinRequest $serviceRequest */
    private $serviceRequest;

    /** @var GenerateSpinService $service */
    private $service;

    /** @var GenerateSpinResponse $serviceResponse */
    private $serviceResponse;

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        $this->serviceRequest = new GenerateSpinRequest($this->columnCount,$this->rowCount);
        $this->service = new GenerateSpinService();
        $this->serviceResponse = $this->service->execute($this->serviceRequest);

        parent::__construct($name, $data, $dataName);
    }

    public function testValidateGridDimension(){
        //assert that grid has right dimensions  per row
        $this->assertEquals(count($this->serviceResponse->getGrid()), $this->rowCount);
        foreach ($this->serviceResponse->getGrid() as $gridRow){
            $this->assertEquals(count($gridRow), $this->columnCount);
        }
    }

    public function testValidatePrintableGridDimension(){
        //assert that printableGrid has right dimensions  per row
        $this->assertEquals(count($this->serviceResponse->getPrintableGrid()), $this->rowCount);
        foreach ($this->serviceResponse->getPrintableGrid() as $gridRow){
            $this->assertEquals(count($gridRow), $this->columnCount);
        }
    }

    public function testInvalidSymbolRequestedValidation(){
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionCode(30001);
        $this->service->getPrintableSymbolVersion('5');
    }

    public function testValidSymbolRequestedValidation(){
        $this->assertEquals('DOG', $this->service->getPrintableSymbolVersion('D'));
        $this->assertEquals('CAT', $this->service->getPrintableSymbolVersion('C'));
        $this->assertEquals('BIR', $this->service->getPrintableSymbolVersion('B'));
        $this->assertEquals('MON', $this->service->getPrintableSymbolVersion('M'));
    }
}