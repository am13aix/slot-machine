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
            $spinRequest= new SpinRequest('EUR', 10);
            ECHO PHP_EOL . PHP_EOL . 'Bet: ' . $spinRequest->getCurrency() . ' ' . $spinRequest->getAmount() . ' cents';

            $spinResponse = $this->spinService->execute($spinRequest);

            //Draw GRID
            foreach ($spinResponse->getGridResult() as $gridRowInfo) {
                echo PHP_EOL . implode("\t",  $gridRowInfo['row']) . "\t => " . $gridRowInfo['payoutPercentage'] . '%';

            }

            //calculate win amount on the payout percentage
            $totalWinAmount =( ($spinRequest->getAmount() / 100) * $spinResponse->getPayoutPercentage());
            //Print result win amount (if exists)
            ECHO PHP_EOL . 'Win: ' . $spinRequest->getCurrency() . ' ' . $totalWinAmount . ' cents (Payout ' . $spinResponse->getPayoutPercentage() . '%)';

        }catch (\Throwable $e){
            Echo 'Error: ' . $e->getMessage();
        }
    }
}
