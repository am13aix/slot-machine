<?php


namespace Demo\Application\Services;


use App\Services\DTO\Request\RequestInterface;
use App\Services\DTO\Response\ResponseInterface;
use App\Services\ServiceInterface;
use Demo\Application\Services\DTO\Request\SpinRequest;
use Demo\Application\Services\DTO\Response\SpinResponse;
use Demo\Domain\Services\CalculatePayoutServiceInterface;
use Demo\Domain\Services\GenerateSpinServiceInterface;

class SpinService implements ServiceInterface
{
    /** @var GenerateSpinServiceInterface */
    private $calculatePayoutService = null;

    /** @var CalculatePayoutServiceInterface */
    private $generateSpinService = null;


    public function __construct(GenerateSpinServiceInterface $generateSpinService, CalculatePayoutServiceInterface $calculatePayoutService)
    {
        $this->calculatePayoutService = $calculatePayoutService;
        $this->generateSpinService = $generateSpinService;
    }

    /**
     * @param RequestInterface|null|SpinRequest $request
     * @return ResponseInterface|null|SpinResponse
     */
    public function execute(RequestInterface $request = null): ?ResponseInterface
    {

        // TODO: Implement execute() method.
        return new SpinResponse('EUR', 20, 20);
    }
}