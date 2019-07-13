<?php


namespace Demo\Application\Commands;

use Demo\Application\Services\DTO\Request\SpinRequest;
use Demo\Application\Services\DTO\Response\SpinResponse;
use Demo\Application\Services\SpinService;
use Illuminate\Console\Command;

class SpinCommand extends Command
{
    /** @var string */
    protected $signature = 'demo:auto-spin';

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
            /** @var SpinResponse $spinResponse */
            $spinResponse = $this->spinService->execute($spinRequest);

            //Draw GRID
            ECHO PHP_EOL . "BOARD\t\t\t\t\tPAYOUT PERCENTAGE \tPAY-LINE";
            foreach ($spinResponse->getGridResult() as $gridRowInfo) {
                echo PHP_EOL . implode("\t",  $gridRowInfo['row']) . "\t\t" . $gridRowInfo['payoutPercentage'] . "%\t\t" . json_encode($gridRowInfo['payLines']);
            }

            //calculate win amount on the payout percentage
            $totalWinAmount =( ($spinRequest->getAmount() / 100) * $spinResponse->getPayoutPercentage());

            //Print initial bet and result win amount (if exists)
            ECHO PHP_EOL . "BET:\t" . $spinRequest->getCurrency() . ' ' . $spinRequest->getAmount() . ' cents';
            ECHO PHP_EOL . "PAYOUT:\t" . $spinResponse->getPayoutPercentage() . '%';
            ECHO PHP_EOL . "WIN:\t" . $spinRequest->getCurrency() . ' ' . $totalWinAmount . ' cents';

        }catch (\Throwable $e){
            Echo 'Error: ' . $e->getMessage();
        }
    }
}
