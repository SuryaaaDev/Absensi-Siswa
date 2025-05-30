<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Status;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function attendances()
    {
        $attendances = Attendance::with('student')->get();
        $statuses = Status::all();
        return view('admin.attendance', compact('attendances', 'statuses'));
    }
}
