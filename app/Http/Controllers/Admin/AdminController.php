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
use App\Duty;

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
    
    public function getAppointments($id, Request $request)
    {
//        $start = strtotime($request->start);
//        $end = strtotime($request->end);
//        $labels = ['Sastanak skupstine', 'Nadzor popravki', 'Obnova ugovora', 'Intervju', 'Sklapanje ugovora', 'Analiza stanja'];
        $array = [];
        
        $appointments = Duty::all();
        
        foreach ($appointments as $num => $appointment){
            //dd($appointment);
            
            $key = $num;
            $array[$num]['start'] = $appointment->date_from . 'T' . $appointment->time_from . ':00';
            $array[$num]['end'] = $appointment->date_to . 'T' . $appointment->time_to . ':00';
            $array[$num]['title'] = $appointment->name;
            $array[$num]['color'] = '#00bcd4';
            $array[$num]['id'] = $appointment->id;
        }
        
//        for($i = 0; $i<20; $i++){
//            $key = random_int(0, 5);
//            $day = random_int(-2, 2);
//            $hour = random_int(10, 20);
//            $length = random_int(1, 3);
//            $array[$i]['start'] = date('Y-m-d\T'.$hour.':00:00' ,strtotime($day.' days'));
//            $array[$i]['end'] = date('Y-m-d\T'.($hour+$length).':00:00' , strtotime($array[$i]['start']));
//            $array[$i]['title'] = $labels[$key];
//            $array[$i]['color'] = '#00bcd4';
//        }
        $data = json_encode($array);
        
        return $data;
    }
    
}

