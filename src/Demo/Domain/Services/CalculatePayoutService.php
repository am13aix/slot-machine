<?php


namespace Demo\Domain\Services;


use App\Services\DTO\Request\RequestInterface;
use App\Services\DTO\Response\ResponseInterface;
use Demo\Domain\Services\DTO\Request\CalculatePayoutRequest;
use Demo\Domain\Services\DTO\Response\CalculatePayoutResponse;

class CalculatePayoutService implements CalculatePayoutServiceInterface
{

    /**
     * @param RequestInterface|null|CalculatePayoutRequest $request
     * @return ResponseInterface|null|CalculatePayoutResponse
     */
    public function execute(RequestInterface $request = null): ?ResponseInterface
    {
        // loop each grid row and calculate payout
        $result=[];
        foreach ($request->getGrid() as $row){
            preg_match('/(.)\1{2,4}/', implode('', $row),$regexResult);

            $match = '';
            $payoutPercentage = 0;
            if(is_array($regexResult) && count($regexResult) > 0 ){
                //get match row
                $match = $regexResult[0];

                //calculate percentage payout
                switch (strlen($match)){
                    case 3:
                        $payoutPercentage = 20;
                        break;
                    case 4:
                        $payoutPercentage = 200;
                        break;
                    case 5:
                        $payoutPercentage = 1000;
                        break;
                    default:
                        $payoutPercentage = 0;
                        break;
                }
            }

            $result[] = [
                'row'=>$row,
                'payoutMatch' => $match,
                'payoutPercentage' => $payoutPercentage
            ];

        }

        return new CalculatePayoutResponse($result);
    }
}