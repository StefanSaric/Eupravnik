<?php

namespace App\Http\Controllers\Admin;

use App\Council;
use App\Http\Controllers\Controller;
use App\Maintenance;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MaintenancesController extends Controller
{
    public function index () {

        $maintenances = Maintenance::join('councils', 'councils.id', '=', 'maintenances.council_id')
            ->select('maintenances.id as id','maintenances.date as date','councils.name as council')
            ->get();
        //dd($maintenances);

        return view('admin.maintenance.allmaintenance', ['active' => 'allMaintenances', 'maintenances' => $maintenances]);
    }

    public function create (){

        $councils = Council::all();
        $user = Auth::user();

        return view('admin.maintenance.create', ['active' => 'addMaintenance', 'councils' => $councils, 'user' => $user ]);
    }

    public function store (Request $request) {

        $user = Auth::user();
        //dd($request->all());

        foreach($request->get('maintenance') as $one_maintenance)
            $maintenance = Maintenance::create([
                'council_id' => $request->council_id,
                'user_id' => $user->id,
                'date' => $request->date,
                'name' => $one_maintenance['name'],
                'condition' => $one_maintenance['condition'],
                'team' => $one_maintenance['team'],
                'priority' => $one_maintenance['priority']]);

        return redirect('admin/maintenance');
    }
}
