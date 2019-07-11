<?php


namespace Demo\Application\Services;


use App\Services\DTO\Request\RequestInterface;
use App\Services\DTO\Request\ResponseInterface;
use App\Services\ServiceInterface;
use Demo\Application\Services\DTO\Request\SpinRequest;
use Demo\Application\Services\DTO\Request\SpinResponse;
use Demo\Domain\Services\CalculatePayoutService;
use Demo\Domain\Services\GenerateSpinService;

class SpinService implements ServiceInterface
{
    /** @var GenerateSpinService */
    private $calculatePayoutService = null;

    /** @var CalculatePayoutService */
    private $generateSpinService = null;


    public function __construct(GenerateSpinService $generateSpinService, CalculatePayoutService $calculatePayoutService)
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
    }
}