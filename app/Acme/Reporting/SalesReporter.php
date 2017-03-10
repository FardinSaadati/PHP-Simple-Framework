<?php

namespace App\Acme\Reporting;

use App\Acme\Reporting\Output\SalesOutputInterface;
use App\Repositories\SaleRepository;
use Carbon\Carbon;

/**
 * Class SalesReporter
 * @package App\Acme\Reporting
 */
class SalesReporter
{
    /**
     * @var SaleRepository
     */
    protected $repo;

    /**
     * SalesReporter constructor.
     * @param SaleRepository $repo
     */
    public function __construct(SaleRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param Carbon $begin
     * @param Carbon $end
     * @param SalesOutputInterface $formatter
     * @return string
     */
    public function between(Carbon $begin, Carbon $end, SalesOutputInterface $formatter)
    {
        $sales = $this->repo->between($begin, $end);

        return $formatter->output($sales);
    }
}