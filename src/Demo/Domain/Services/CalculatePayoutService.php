<?php


namespace Demo\Domain\Services;


use App\Services\DTO\Request\RequestInterface;
use App\Services\DTO\Response\ResponseInterface;
use Demo\Domain\Model\PayoutRowInformation;
use Demo\Domain\Services\DTO\Request\CalculatePayoutRequest;
use Demo\Domain\Services\DTO\Response\CalculatePayoutResponse;

/**
 * Class CalculatePayoutService
 *
 * @package Demo\Domain\Services
 */
class CalculatePayoutService implements CalculatePayoutServiceInterface
{

    /**
     * @var array Fixed pay-line grid
     */
    private $payLineGrid = [
      [0,3,6,9,12],
      [1,4,7,10,13],
      [2,5,8,11,14],
      [0,4,8,10,12],
      [2,4,6,10,14]
    ];

    /**
     * @param RequestInterface|null|CalculatePayoutRequest $request
     * @return ResponseInterface|null|CalculatePayoutResponse
     */
    public function execute(RequestInterface $request = null): ?ResponseInterface
    {
        // loop each grid row and calculate payout
        $result=[];
        $totalPayoutPercentage =0;
        for($rowIndex = 1; $rowIndex <=3; $rowIndex++){

            //get row columns
            $row = $request->getGrid()[$rowIndex-1];
            $printableRow = $request->getPrintableGrid()[$rowIndex-1];

            //identify potential win
            preg_match('/(.)\1{2,4}/', implode('', $row),$regexResult);

            //calculate payout percentage according to the about of consecutive identical symbols
            $match = '';
            $payoutPercentage = 0;
            if(is_array($regexResult) && count($regexResult) > 0 ){
                //get match row
                $match = $regexResult[0];

                //calculate payout percentage
                $payoutPercentage = $this->getPayoutPercentagePerMatchLength(strlen($match));
            }

            //get related matching pay-lines as per $this->payLineGrid
            $payLines  = [];
            if (strlen($match)>2){
                //initial dimension
                $payLines[] = $this->payLineGrid[$rowIndex];

                //next potential pay-line
                $potentialIndex =(int) $rowIndex + count($request->getGrid());
                if (count($this->payLineGrid) >= $potentialIndex){
                    $payLines[] = $this->payLineGrid[$potentialIndex-1];
                }
            }

            $totalPayoutPercentage= $totalPayoutPercentage +$payoutPercentage;
            $result[] = new PayoutRowInformation($row, $printableRow, str_split($match), $payLines, $payoutPercentage);
        }

        return new CalculatePayoutResponse($result, $totalPayoutPercentage);
    }

    /** According to the occurrence of the same symbol, determine the percentage
     * @param $length  int total length of match
     * @return int calculated payout percentage on the length
     */
    private function getPayoutPercentagePerMatchLength($length){
        //calculate percentage payout
        switch ($length){
            case 3:
                return 20;
                break;
            case 4:
                return 200;
                break;
            case 5:
                return 1000;
                break;
            default:
                return 0;
                break;
        }
    }
}