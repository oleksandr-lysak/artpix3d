<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\WorkHistory;

class MachineController extends Controller
{
    public function index()
    {
        return Machine::all();
    }

    public function info($id)
    {
        $machine = Machine::with(['workInfo'])->find($id);
        if (!$machine) {
            return response()->json([
                'success' => false,
                'error' => ['message' => 'The machine was not found'],
            ], 404);
        }


        return response()->json([
            'success' => true,
            'data' => [
                'message' => 'The info of machine',
                'info' => $machine
            ],
        ], 200);
    }

    public function history($id)
    {
        $history = WorkHistory::where(['machine_id' => $id])->whereNotNull('end_date')->with('employee')->paginate(10);
        if (!$history) {
            return response()->json([
                'success' => false,
                'error' => ['message' => 'The history of machine is empty'],
            ], 404);
        }


        return response()->json(
            [
                'success' => true,
                'data' => [
                    'message' => 'The history of machine',
                    'history' => $history
                ]
            ],
            200
        );
    }
}
