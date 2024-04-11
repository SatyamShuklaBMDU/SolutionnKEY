<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ScheduleSlot;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SlotController extends Controller
{
    public function register(Request $request)
    {
        $rules = [
        'customer_id' => 'required|exists:customers,id',
        'vendor_id' => 'required|exists:vendors,id',
        'type' => 'required|in:online,physical',
        'date' => 'required|date',
        'preferred_time_1' => 'required|date_format:H:i',
        'preferred_time_2' => 'nullable|date_format:H:i',
        'communication_mode' => 'nullable|in:chat,video,audio',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        try {
            $call_id = 'ABC' . str_pad(random_int(0, 999), 3, '0', STR_PAD_LEFT);
            $date = Carbon::parse($request->input('date'));
            $preferred_time_1 = Carbon::parse($request->input('preferred_time_1'));
            $preferred_time_2 = $request->input('preferred_time_2') ? Carbon::parse($request->input('preferred_time_2')) : null;
            $slot = ScheduleSlot::create([
                'call_id' => $call_id,
                'customer_id' => $request->customer_id,
                'vendor_id' => $request->vendor_id,
                'type' => $request->type,
                'date' => $date,
                'preferred_time_1' => $preferred_time_1,
                'preferred_time_2' => $preferred_time_2,
                'communication_mode' => $request->communication_mode,
                'status' => 'Booked'
            ]);
            return response()->json(['message' => 'Schedule slot registered successfully', 'data' => $slot], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Error registering schedule slot: ' . $e->getMessage()], 500);
        }
    }

    public function vendorRegister(Request $request)
    {
        
    }
}
