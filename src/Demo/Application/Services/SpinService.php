<?php


namespace Demo\Application\Services;


use App\Services\DTO\Request\RequestInterface;
use App\Services\DTO\Response\ResponseInterface;
use App\Services\ServiceInterface;
use Demo\Application\Services\DTO\Request\SpinRequest;
use Demo\Application\Services\DTO\Response\SpinResponse;
use Demo\Domain\Services\CalculatePayoutServiceInterface;
use Demo\Domain\Services\DTO\Request\CalculatePayoutRequest;
use Demo\Domain\Services\DTO\Request\GenerateSpinRequest;
use Demo\Domain\Services\DTO\Response\CalculatePayoutResponse;
use Demo\Domain\Services\DTO\Response\GenerateSpinResponse;
use Demo\Domain\Services\GenerateSpinServiceInterface;

class SpinService implements ServiceInterface
{
    /** @var CalculatePayoutServiceInterface */
    private $calculatePayoutService = null;

    /** @var GenerateSpinServiceInterface */
    private $generateSpinService = null;


    public function __construct(
        GenerateSpinServiceInterface $generateSpinService,
        CalculatePayoutServiceInterface $calculatePayoutService
    ) {
        $this->calculatePayoutService = $calculatePayoutService;
        $this->generateSpinService = $generateSpinService;
    }

    /**
     * @param RequestInterface|null|SpinRequest $request
     * @return ResponseInterface|null|SpinResponse
     * @throws \Exception
     */
    public function execute(RequestInterface $request = null): ?ResponseInterface
    {
        //generate the random sequence
        /** @var GenerateSpinResponse $generatedGrid */
        $generateSpinServiceResponse = $this->generateSpinService->execute(new GenerateSpinRequest(5, 3));

        /** @var array $generatedGrid */
        $generatedGrid = $generateSpinServiceResponse->getGrid();


        //calculate if there is a payout
        /** @var CalculatePayoutResponse $calculatePayoutResponse */
        $calculatePayoutResponse = $this->calculatePayoutService->execute(new CalculatePayoutRequest($generatedGrid));

        $totalPayoutPercentage = 0;
        foreach($calculatePayoutResponse->getGridWithRowPayout() as $rowInformation){
            $totalPayoutPercentage = $totalPayoutPercentage + (int) $rowInformation['payoutPercentage'];
        }

        //TODO: Return response with win
        return new SpinResponse('EUR', 20, $totalPayoutPercentage);


    }
}