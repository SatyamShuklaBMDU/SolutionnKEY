<?php

namespace App\Http\Controllers;

use App\Models\ScheduleSlot;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function online_booking()
    {
        $schedule_slots = ScheduleSlot::all();
        return view('admin.all_online_booking',compact('schedule_slots'));
    }
    public function physical_booking(){
        $schedule_slots = ScheduleSlot::all();
        return view('admin.all_physical_booking',compact('schedule_slots'));
    }
}
