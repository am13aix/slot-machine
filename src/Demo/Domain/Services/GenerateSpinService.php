<?php


namespace Demo\Domain\Services;


use App\Services\DTO\Request\RequestInterface;
use App\Services\DTO\Response\ResponseInterface;
use Demo\Domain\Services\DTO\Request\GenerateSpinRequest;
use Demo\Domain\Services\DTO\Response\GenerateSpinResponse;
use http\Exception\InvalidArgumentException;
use function MongoDB\BSON\toJSON;

/**
 * Class GenerateSpinService
 *
 * @package Demo\Domain\Services
 */
class GenerateSpinService implements GenerateSpinServiceInterface
{
    /**
     * @var array
     */
    private $allowedSymbols = ['9','0','J','Q','K','A','C','D','M','B'];
    /**
     * @var array
     */
    private $allowedPrintableSymbols = ['9','10','J','Q','K','A','CAT','DOG','MON','BIR'];

    /**
     * @param RequestInterface|null|GenerateSpinRequest $request
     * @return ResponseInterface|null|GenerateSpinResponse
     */
    public function execute(RequestInterface $request = null): ?ResponseInterface
    {
        $combination = [];
        $printableCombination = [];
        for ($r =0; $r<$request->getRowCount(); $r++){
            $row = [];
            $printableRow = [];
            for ($c =0; $c<$request->getColumnCount(); $c++){
                $symbol = $this->allowedSymbols[array_rand($this->allowedSymbols)];
                $row[] = $symbol;
                $printableRow[] = $this->getPrintableSymbolVersion($symbol);
            }

            $combination[] = $row;
            $printableCombination[] = $printableRow;
        }
        //Return the characters.
        return new GenerateSpinResponse($combination, $printableCombination);
    }

    /**
     * @param $symbol
     * @return mixed
     */
    public function getPrintableSymbolVersion($symbol){
        $index = array_search($symbol, $this->allowedSymbols);
        if ($index===false){
            throw new \InvalidArgumentException("The symbol [$symbol] does not exist",3001);
        }
        return $this->allowedPrintableSymbols[$index];
    }
}