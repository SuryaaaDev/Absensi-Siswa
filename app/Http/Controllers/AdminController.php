<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Mode;
use App\Models\Permission;
use App\Models\StudentClass;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::where('is_admin', false)->count();
        $classes = StudentClass::count();
        $attendances = Attendance::count();


        return view('admin.dashboard', compact('users', 'classes', 'attendances'));
    }
}
