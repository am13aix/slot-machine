<?php


namespace Demo\Application\Commands;

use App\Services\ServiceInterface;
use Demo\Application\Services\DTO\Request\SpinRequest;
use Demo\Application\Services\SpinService;
use Illuminate\Console\Command;

class SpinCommand extends Command
{
    /** @var string */
    protected $signature = 'demo:spin';

    /** @var string */
    protected $description = 'Generate a random spin with a bet amount of Eur 1.00';

    /** @var SpinService */
    private $spinService;

    /**
     * SpinCommand constructor.
     *
     * @param SpinService $spinService
     */
    public function __construct(SpinService $spinService)
    {
        parent::__construct();
        $this->spinService = $spinService;
    }

    public function handle()
    {
        try{
            $spinRequest= new SpinRequest('EUR', 0);
            ECHO 'Bet: ' . $spinRequest->getCurrency() . ' ' . $spinRequest->getAmount() . PHP_EOL;
            $spinResponse = $this->spinService->execute($spinRequest);
            ECHO 'Win: ' . $spinResponse->getCurrency() . ' ' . $spinResponse->getAmount() . ' (Payout ' . $spinResponse->getPayoutPercentage() . '%)'. PHP_EOL;

        }catch (\Throwable $e){
            Echo 'Error: ' . $e->getMessage();
        }
    }
}
