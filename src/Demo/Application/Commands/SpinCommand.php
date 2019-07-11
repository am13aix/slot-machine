<?php


namespace Demo\Application\Commands;

use Illuminate\Console\Command;

class SpinCommand extends Command
{
    /** @var string */
    protected $signature = 'demo:spin';

    /** @var string */
    protected $description = 'Generate a random spin with a bet amount of Eur 1.00';

    public function __construct()
    {
        parent::__construct();
        //$this->bonusInstanceBatchProcessor = $bonusInstanceBatchProcessor;
    }

    public function handle()
    {
        //$this->bonusInstanceBatchProcessor->process();
    }
}
