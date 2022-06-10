<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalesCommissionValidator;
use App\Lib\SalesCommissions;

class SalaryController extends Controller
{
    public function salesCommission(SalesCommissionValidator $request)
    {
        $data = $request->all();
        [
            'salaryBase' => $salaryBase,
            'daysWorked' => $daysWorked,
            'sales' => $sales,
        ] = $data;

        $salesCommission = new SalesCommissions($salaryBase, $sales, $daysWorked);
        $data['salesCommission'] = [
            'percentage' => $salesCommission->percentage,
            'amount' => $salesCommission->amount,
        ];
        $data['salaryWithCommissions'] = $salesCommission->salaryWithCommission;

        return response()->json($data);
    }
}
