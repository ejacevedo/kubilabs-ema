<?php

namespace Tests\Feature\app\Lib;

use App\Lib\SalesCommissions;
use Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
class SalesCommissionsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testSalesCommissionEqualToZeroWithFifteenDaysOfWork()
    {
        $salaryBase = 1250;
        $daysWorked = 15;
        $sales = 0;

        $salesCommission = new SalesCommissions($salaryBase, $sales, $daysWorked);
        $this->assertEquals(1256.25, $salesCommission->salaryWithCommission);
        $this->assertEquals(6.25, $salesCommission->amount);
        $this->assertEquals(0.5, $salesCommission->percentage);
    }

    public function testSalesCommissionLessThanAThousandWithThirtyDaysOfWork()
    {
        $salaryBase = 2500;
        $daysWorked = 30;
        $sales = 500;

        $salesCommission = new SalesCommissions($salaryBase, $sales, $daysWorked);
        $this->assertEquals(2525, $salesCommission->salaryWithCommission);
        $this->assertEquals(25, $salesCommission->amount);
        $this->assertEquals(1, $salesCommission->percentage);
    }

    public function testSalesCommissionEqualToThousandWithThirtyDaysOfWork()
    {
        $salaryBase = 3502;
        $daysWorked = 30;
        $sales = 1000;

        $salesCommission = new SalesCommissions($salaryBase, $sales, $daysWorked);
        $this->assertEquals(3537.02, $salesCommission->salaryWithCommission);
        $this->assertEquals(35.02, $salesCommission->amount);
        $this->assertEquals(1, $salesCommission->percentage);
    }

    public function testSalesCommissionGreaterThanFiveThousandWithThirtyDaysOfWork()
    {
        $salaryBase = 4500;
        $daysWorked = 30;
        $sales = 5050;

        $salesCommission = new SalesCommissions($salaryBase, $sales, $daysWorked);
        $this->assertEquals(4950, $salesCommission->salaryWithCommission);
        $this->assertEquals(450, $salesCommission->amount);
        $this->assertEquals(10, $salesCommission->percentage);
    }

    public function testSalesCommissionGreaterThanFiveThousandWithFifteenDaysOfWork()
    {
        $salaryBase = 8500;
        $daysWorked = 15;
        $sales = 6700;

        $salesCommission = new SalesCommissions($salaryBase, $sales, $daysWorked);
        $this->assertEquals(8925, $salesCommission->salaryWithCommission);
        $this->assertEquals(425, $salesCommission->amount);
        $this->assertEquals(5, $salesCommission->percentage);
    }

    public function testSalesCommissionOverOneThousandWithFifteenWorkingDays()
    {
        $salaryBase = 2350;
        $daysWorked = 15;
        $sales = 1500;

        $salesCommission = new SalesCommissions($salaryBase, $sales, $daysWorked);
        $this->assertEquals(2408.75, $salesCommission->salaryWithCommission);
        $this->assertEquals(58.75, $salesCommission->amount);
        $this->assertEquals(2.5, $salesCommission->percentage);
    }

    public function testSalesCommissionOverOneThousandWithThirtyWorkingDays()
    {
        $salaryBase = 2700;
        $daysWorked = 30;
        $sales = 3500;

        $salesCommission = new SalesCommissions($salaryBase, $sales, $daysWorked);
        $this->assertEquals(2835, $salesCommission->salaryWithCommission);
        $this->assertEquals(135, $salesCommission->amount);
        $this->assertEquals(5, $salesCommission->percentage);
    }
}
