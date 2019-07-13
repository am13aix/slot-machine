<?php


namespace Demo\Domain\Model;


/**
 * Class PayoutRowInformation Model containing all the information per row
 *
 * @package Demo\Domain\Model
 */
class PayoutRowInformation
{
    /**
     * @var array Row symbols
     */
    private $row = [];
    /**
     * @var array Row printable symbols
     */
    private $printableRow = [];
    /**
     * @var array Matching symbols
     */
    private $payoutMatch = [];
    /**
     * @var array matching pay-lines
     */
    private $payLines = [];
    /**
     * @var int total percentage won
     */
    private $payoutPercentage = 0;

    /**
     * Model constructor.
     *
     * @param array $row
     * @param array $printableRow
     * @param array $payoutMatch
     * @param array $payLines
     * @param int $payoutPercentage
     */
    public function __construct(
        array $row,
        array $printableRow,
        array $payoutMatch,
        array $payLines,
        int $payoutPercentage
    ) {
        $this->row = $row;
        $this->printableRow = $printableRow;
        $this->payoutMatch = $payoutMatch;
        $this->payLines = $payLines;
        $this->payoutPercentage = $payoutPercentage;
    }

    /**
     * @return array
     */
    public function getRow(): array
    {
        return $this->row;
    }

    /**
     * @return array
     */
    public function getPrintableRow(): array
    {
        return $this->printableRow;
    }

    /**
     * @return array
     */
    public function getPayoutMatch(): array
    {
        return $this->payoutMatch;
    }

    /**
     * @return array
     */
    public function getPayLines(): array
    {
        return $this->payLines;
    }

    /**
     * @return int
     */
    public function getPayoutPercentage(): int
    {
        return $this->payoutPercentage;
    }

}