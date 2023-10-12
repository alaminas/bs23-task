<?php

namespace App\Http\Controllers;

use App\Models\TrafficTransaction;
use Illuminate\Http\Request;

class TrafficTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TrafficTransaction::all();
        if ($data->count() > 0) {
            return response()->json($data, 200);
        } else {
            return response()->json([], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new TrafficTransaction();
        $data->amount = $request->amount;
        $data->user_id = $request->user_id;
        $data->transaction_id = $request->transaction_id;
        $data->status = $request->status;
        $result = $data->save();
        if ($result) {
            return response()->json('Data store successfully', 200);
        } else {
            return response()->json([], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrafficTransaction $trafficTransaction)
    {
        $result = TrafficTransaction::where('transaction_id', $request->transation_id)
            ->update('status', $request->status);
        if ($result) {
            return response()->json('Updated successfully', 200);
        } else {
            return response()->json([], 200);
        }
    }
}
