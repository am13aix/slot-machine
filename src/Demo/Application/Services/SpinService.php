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

/**
 * Class SpinService
 *
 * @package Demo\Application\Services
 */
class SpinService implements ServiceInterface
{
    /** @var CalculatePayoutServiceInterface */
    private $calculatePayoutService = null;

    /** @var GenerateSpinServiceInterface */
    private $generateSpinService = null;


    /**
     * SpinService constructor.
     *
     * @param GenerateSpinServiceInterface    $generateSpinService
     * @param CalculatePayoutServiceInterface $calculatePayoutService
     */
    public function __construct(
        GenerateSpinServiceInterface $generateSpinService,
        CalculatePayoutServiceInterface $calculatePayoutService
    ) {
        $this->calculatePayoutService = $calculatePayoutService;
        $this->generateSpinService = $generateSpinService;
    }

    /**
     * Binds all the domain services to generate the grid
     * and calculate the payout percentage related to the generated grid
     *
     * @param RequestInterface|null|SpinRequest $request
     * @return ResponseInterface|null|SpinResponse Contains the generated grid, payout per row and total payout
     * @throws \Exception
     */
    public function execute(RequestInterface $request = null): ?ResponseInterface
    {
        //generate the random sequence
        /** @var GenerateSpinResponse $generatedGrid */
        $generateSpinServiceResponse = $this->generateSpinService->execute(new GenerateSpinRequest(5, 3));

        //calculate if there is a payout
        /** @var CalculatePayoutResponse $calculatePayoutResponse */
        $calculatePayoutResponse = $this->calculatePayoutService->execute(new CalculatePayoutRequest($generateSpinServiceResponse->getGrid(), $generateSpinServiceResponse->getPrintableGrid()));

        //Return response with win
        echo PHP_EOL . $calculatePayoutResponse->getTotalPayoutPercentage() . PHP_EOL;
        return new SpinResponse($calculatePayoutResponse->getGridWithRowPayout(), $calculatePayoutResponse->getTotalPayoutPercentage());
    }
}