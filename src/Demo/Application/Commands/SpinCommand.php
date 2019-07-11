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
//        $spinResponse = $this->spinService->execute(new SpinRequest('EUR', 100));
//        ECHO json_encode($spinResponse) . PHP_EOL;
    }
}
