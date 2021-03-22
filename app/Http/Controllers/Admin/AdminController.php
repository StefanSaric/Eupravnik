<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Appointment;
use App\Shift;
use App\User;
use App\Patient;
use App;
use Auth;

class AdminController extends Controller
{
    /**
     * Shows dashboard with calendar.
     *
     * @return view(admin/dash)
     */
    public function index()
    {
        
        return view ('admin.dash', ['active' => 'dash']);
    }
    
}

