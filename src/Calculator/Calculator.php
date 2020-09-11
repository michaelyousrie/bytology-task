<?php

namespace Bytology\Calculator;

use Bytology\Helpers\Log;

/**
 * Calculator
 * 
 * Calculates the required math operations
 *  on the input arguments
 * 
 * NOTE: A simple form of caching is used here to 
 * store the operations' results to simulate a 
 * solution for other form of calculations 
 * that might take more time to calculate
 * 
 * This is also useful in case we want to fetch 
 * the results of the calculations somewhere
 * else without the need to recalculate
 * the required result
 */
class Calculator
{
    protected $num1;
    protected $num2;

    protected $avg = null;
    protected $area = null;
    protected $areaSquared = null;

    public function __construct($num1, $num2)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function getAvg()
    {
        if ($this->avg == null) {
            $this->avg = (($this->num1 + $this->num2) / 2);
        }

        return $this->avg;
    }

    public function getArea()
    {
        if ($this->area == null) {
            $this->area = ($this->num1 * $this->num2);
        }

        return $this->area;
    }

    public function getAreaSquared()
    {
        if ($this->areaSquared == null) {
            $this->areaSquared = ($this->getArea() ** 2);
        }

        return $this->areaSquared;
    }

    /**
     * Display some information about the inputs
     * and the results of the calculations
     * 
     * Note that I call Log::info directly 
     * and use br as a helper function
     * 
     * This is used just as a proof of concept that 
     * both ways are working as expected.
     *
     * @return void
     */
    public function display()
    {
        Log::header("Calculator Info");
        br();
        Log::info("First number => {$this->num1}");
        br();
        Log::info("Second number => {$this->num2}");
        br();
        Log::success("Area => {$this->getArea()}");
        br();
        Log::success("Area Squared => {$this->getAreaSquared()}");
        br();
        Log::success("Average => {$this->getAvg()}");
        br();
        Log::footer();
        br();
    }
}
