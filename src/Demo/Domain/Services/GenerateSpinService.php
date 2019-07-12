<?php


namespace Demo\Domain\Services;


use App\Services\DTO\Request\RequestInterface;
use App\Services\DTO\Response\ResponseInterface;
use Demo\Domain\Services\DTO\Request\GenerateSpinRequest;
use Demo\Domain\Services\DTO\Response\GenerateSpinResponse;

class GenerateSpinService implements GenerateSpinServiceInterface
{
    private $allowedSymbols = ['9','10','J','Q','K','A','cat','dog','monkey','bird'];

    /**
     * @param RequestInterface|null|GenerateSpinRequest $request
     * @return ResponseInterface|null|GenerateSpinResponse
     */
    public function execute(RequestInterface $request = null): ?ResponseInterface
    {
        $combination = [];
        for ($r =0; $r<$request->getRowCount(); $r++){
            $row = [];
            for ($c =0; $c<$request->getColumnCount(); $c++){
                $row[] = $this->allowedSymbols[array_rand($this->allowedSymbols)];
            }

            $combination[] = $row;
        }
        //Return the characters.
        return new GenerateSpinResponse($combination);
    }
}