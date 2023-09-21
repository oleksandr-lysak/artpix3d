<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WorkHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WorkHistoryController extends Controller
{
    public function assignMachine(Request $request)
    {
        $employeeId = $request->input('employee_id');
        $machineId = $request->input('machine_id');

        $existingAssignment = WorkHistory::where('machine_id', $machineId)
            ->whereNull('end_date')
            ->first();

        if ($existingAssignment) {
            return response()->json(['success' => false, 'message' => 'This machine is busy.'], 400);
        }

        $workHistory = new WorkHistory();
        $workHistory->employee_id = $employeeId;
        $workHistory->machine_id = $machineId;
        $workHistory->start_date = Carbon::now();
        $workHistory->save();

        return response()->json(['success' => true, 'message' => 'The machine is assigned to the employee.'], 201);
    }

    public function unassignMachine(Request $request)
    {
        $employeeId = $request->input('employee_id');
        $machineId = $request->input('machine_id');

        $workHistory = WorkHistory::where('employee_id', $employeeId)
            ->where('machine_id', $machineId)
            ->whereNull('end_date')
            ->first();

        if (!$workHistory) {
            return response()->json([
                'success' => false,
                'error' => ['message' => 'The record was not found or the machine is already marked as free'],
            ], 404);
        }
        $workHistory->end_date = Carbon::now();
        $workHistory->save();

        return response()->json(['success' => true, 'message' => 'The machine is marked as free.'], 200);
    }
}
