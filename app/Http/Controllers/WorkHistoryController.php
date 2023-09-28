<?php

namespace App\Http\Controllers;

use App\Models\WorkHistory;
use Carbon\Carbon;


class WorkHistoryController extends Controller
{
    public function assignMachine($employeeId, $machineId)
    {
        $existingAssignment = WorkHistory::where('machine_id', $machineId)
            ->whereNull('end_date')
            ->first();

        if ($existingAssignment) {
            return response()->json([
                'success' => false,
                'error' => [
                    'message' => 'The machine is not free'
                ]
            ], 400);
        }

        $workHistory = new WorkHistory();
        $workHistory->employee_id = $employeeId;
        $workHistory->machine_id = $machineId;
        $workHistory->start_date = Carbon::now();
        $workHistory->save();

        return response()->json([
            'success' => true,
            'data' => [
                'message' => 'The machine is assigned to the employee.'
            ]
        ], 201);
    }

    public function unassignMachine($employeeId, $machineId)
    {
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

        return response()->json([
            'success' => true,
            'data' => [
                'message' => 'The machine is marked as free.'
            ]
        ], 200);
    }
}
