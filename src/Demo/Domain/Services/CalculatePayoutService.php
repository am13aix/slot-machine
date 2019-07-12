<?php


namespace Demo\Domain\Services;


use App\Services\DTO\Request\RequestInterface;
use App\Services\DTO\Response\ResponseInterface;
use Demo\Domain\Services\DTO\Response\CalculatePayoutResponse;

class CalculatePayoutService implements CalculatePayoutServiceInterface
{

    /**
     * @param RequestInterface|null $request
     * @return ResponseInterface|null|CalculatePayoutResponse
     */
    public function execute(RequestInterface $request = null): ?ResponseInterface
    {
        // TODO: Implement execute() method.

        $result = [
            [
                'grid'=>[],
                'payoutPercentage' => 20
            ],
            [
                'grid'=>[],
                'payoutPercentage' => 20
            ],
            [
                'grid'=>[],
                'payoutPercentage' => 0
            ]
        ];
        return new CalculatePayoutResponse($result);
    }
}