<?php


namespace Test\Application\Services\DTO\Request;


use Demo\Application\Services\DTO\Request\SpinRequest;
use Test\TestCase;

class SpinRequestTest extends TestCase
{
    public function testInvalidCurrencyValidation(){
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionCode(10001);
        $request = new SpinRequest('XXX',1);
    }
    public function testAmountCannotBeLessOrEqualToZeroValidation(){
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionCode(10002);
        $request = new SpinRequest('EUR',-1);
    }
    public function testValidationSuccessful(){
        $request = new SpinRequest('EUR',1);

        $this->assertEquals($request->getCurrency(), 'EUR');
        $this->assertEquals($request->getAmount(), 1);
    }

}