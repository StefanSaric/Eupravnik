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
            ->where('maintenances.type', '=', 'check')
            ->select('maintenances.id as id','maintenances.date as date','councils.name as council')
            ->get();
        //dd($maintenances);

        return view('admin.maintenance.allmaintenance', ['active' => 'allMaintenances', 'maintenances' => $maintenances]);
    }

    public function create (){

        $councils = Council::all();
        $user = Auth::user();
        
        return view('admin.maintenance.create', ['active' => 'addMaintenance', 'councils' => $councils, 'user' => $user]);
    }

    public function store (Request $request) {

        $user = Auth::user();
        //dd($request);
        
        $maintenances = $request->get('maintenance');
        //dd($maintenances);
        
       
        
        if($maintenances != null){
            foreach ($maintenances as $maintenance){
                // There are 3 types of maintenance: 
                // 1)Provera stanja-CHECK, 2)Program odrzavanja-PROGRAM, 3)Radni nalog-ASSIGNMENT
                // When check box is checked, on submit btn, 2 types of maintenance will be created: 1) and 2)
                if(isset($maintenance['type_check'])){
                    
                    $newMaintenanceCheck = Maintenance::create([
                                'council_id' => $request->council_id,
                                'user_id' => $user->id,
                                'date' => $request->date,
                                'name' => $maintenance['name'],
                                'reported_condition' => $maintenance['reported_condition'],
                                'contractor' => $maintenance['contractor'],
                                'priority' => $maintenance['priority'],
                                'element_date' => $maintenance['element_date'],
                                'type' => 'check'
                    ]);
                    
                    $newMaintenanceProgram = Maintenance::create([
                                'council_id' => $request->council_id,
                                'user_id' => $user->id,
                                'date' => $request->date,
                                'name' => $maintenance['name'],
                                'reported_condition' => $maintenance['reported_condition'],
                                'contractor' => $maintenance['contractor'],
                                'priority' => $maintenance['priority'],
                                'element_date' => $maintenance['element_date'],
                                'type' => 'program'
                    ]);
                    
                    $newMaintenanceCheck->save();
                    $newMaintenanceProgram->save();
                    
                } else {

                    $newMaintenanceCheck = Maintenance::create([
                                'council_id' => $request->council_id,
                                'user_id' => $user->id,
                                'date' => $request->date,
                                'name' => $maintenance['name'],
                                'reported_condition' => $maintenance['reported_condition'],
                                'contractor' => $maintenance['contractor'],
                                'priority' => $maintenance['priority'],
                                'element_date' => $maintenance['element_date'],
                                'type' => 'check'
                    ]);
                    $newMaintenanceCheck->save();
                }
            }
            
        } else {
            $newMaintenance = Maintenance::create([
                        'council_id' => $request->council_id,
                        'user_id' => $user->id,
                        'date' => $request->date,
                        'type' => 'check'
                ]);
            $newMaintenance->save();
        }

        return redirect('admin/maintenance');
    }
}
