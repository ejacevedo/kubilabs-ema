<?php

namespace App\Lib;

class SalesCommissions
{
    /**
     * @var float
     */
    public $percentage;

    /**
     * @var float
     */
    public $amount;

    /**
     * @var float
     */
    public $salaryWithCommission;

    public function __construct(float $salaryBase, float $sales, float $daysWorked)
    {
        $percentage = $this->percentageForSales($sales, $daysWorked);
        $amountCommission = $this->getAmountCommission($percentage, $salaryBase);

        $this->setPercentage($percentage);
        $this->setAmount($amountCommission);
        $this->setSalaryWithCommission($amountCommission, $salaryBase);
    }

    public function percentageForSales(float $sales, int $daysWorked)
    {
        return match (true) {
            $sales > 5000 => $this->percentageDayWorked($daysWorked, 10),
            $sales > 1000 => $this->percentageDayWorked($daysWorked, 5),
            $sales <= 1000 => $this->percentageDayWorked($daysWorked, 1)
        };
    }

    public function percentageDayWorked(int $daysWorked, float $percentage)
    {
        $numberDays = 30;
        if ($daysWorked < $numberDays) {
            return ($daysWorked * $percentage) / $numberDays;
        }

        return $percentage;
    }

    /**
     * Set the value of percentage.
     *
     * @return self
     */
    public function setPercentage(float $percentage)
    {
        $this->percentage = $percentage;

        return $this;
    }

    /**
     * Set the value of amount.
     *
     * @return self
     */
    public function setAmount(float $amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Set the value of amount.
     * Set the value of salaryBase.
     *
     * @return self
     */
    public function setSalaryWithCommission(float $amountCommission, float $salaryBase)
    {
        $this->salaryWithCommission = $amountCommission + $salaryBase;

        return $this;
    }

    public function getAmountCommission(float $percentage, float $salaryBase)
    {
        return ($percentage * $salaryBase) / 100;
    }

    public function has(string $na)
    {
        return true;
    }
}
