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
            ->where('maintenances.user_id', '=' ,  Auth::user()->id)
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
        //dd($request);
        
        $maintenances = $request->get('maintenance');
        //dd($maintenances);
        if($maintenances != null){
            foreach ($maintenances as $maintenance){
                $newMaintenance = Maintenance::create([
                        'council_id' => $request->council_id,
                        'user_id' => $user->id,
                        'date' => $request->date,
                        'name' => $maintenance['name'],
                        'reported_condition' => $maintenance['reported_condition'],
                        'contractor' => $maintenance['contractor'],
                        'priority' => $maintenance['priority']
                ]);
            $newMaintenance->save();
            }
            
        } else {
            $newMaintenance = Maintenance::create([
                        'council_id' => $request->council_id,
                        'user_id' => $user->id,
                        'date' => $request->date
                ]);
            $newMaintenance->save();
        }

        return redirect('admin/maintenance');
    }
}
