<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\WorkHistory;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::all();
    }

    public function info($id)
    {
        $employee = Employee::with(['workInfo'])->find($id);
        if (!$employee) {
            return response()->json([
                'success' => false,
                'error' => ['message' => 'The employee was not found'],
            ], 404);
        }


        return response()->json([
            'success' => true,
            [
                'message' => 'The info of employee',
                'info' => $employee
            ]
        ], 200);
    }

    public function history($id)
    {
        $history = WorkHistory::where(['employee_id' => $id])->whereNotNull('end_date')->with('machine')->paginate(10);
        if (!$history) {
            return response()->json([
                'success' => false,
                'error' => ['message' => 'The history is empty'],
            ], 404);
        }


        return response()->json(
            [
                'success' => true,
                'data' =>
                [
                    'message' => 'The history of employee',
                    'history' => $history
                ]
            ],
            200
        );
    }
}
