<?php

namespace App\Http\Controllers\Admin;

use App\Council;
use App\Http\Controllers\Controller;
use App\Maintenance;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class MaintenancesController extends Controller
{
    public function index () {

        $maintenances = Maintenance::join('councils', 'councils.id', '=', 'maintenances.council_id')
            ->join('users', 'users.id', '=', 'maintenances.user_id')
            ->where('maintenances.user_id', '=' ,  Auth::user()->id)
            ->where('maintenances.type', '=', 'check')
            ->groupBy('maintenances.group_id', 'users.name', 'councils.name', 'maintenances.date')
            ->select('maintenances.date as date','maintenances.group_id as group_id','councils.name as council', 'users.name as user')
            ->get();
        //dd($maintenances);

        return view('admin.maintenance.allmaintenance', ['active' => 'allMaintenances', 'maintenances' => $maintenances]);
    }
    
    public function onemaintenance ($group_id) {

        $maintenances = Maintenance::join('councils', 'councils.id', '=', 'maintenances.council_id')
            ->where('maintenances.user_id', '=' ,  Auth::user()->id)
            ->where('maintenances.type', '=', 'check')
            ->where('group_id', '=', $group_id)
            ->select('maintenances.id as id',
                    'maintenances.date as date',
                    'maintenances.group_id as group_id',
                    'maintenances.name as name',
                    'maintenances.reported_condition as reported_condition',
                    'maintenances.contractor as contractor',
                    'maintenances.priority as priority',
                    'maintenances.element_date as element_date',
                    'councils.name as council')
            ->get();
        
        
        //$maintenances = Maintenance::where('group_id', '=', $group_id)->get();
        //dd($maintenances);

        return view('admin.maintenance.onemaintenance', ['active' => 'allMaintenances', 'maintenances' => $maintenances]);
    }

    public function create (){

        $councils = Council::all();
        $user = Auth::user();
        
        return view('admin.maintenance.create', ['active' => 'addMaintenance', 'councils' => $councils, 'user' => $user]);
    }

    public function store (Request $request) {

        $user = Auth::user();
        //dd($request);
        $date = date('Y-m-d', strtotime($request->date));
        $groupId = $user->id . '_' . $request->council_id . '_' . $date;
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
                                'group_id' => $groupId,
                                'date' => $date,
                                'name' => $maintenance['name'],
                                'reported_condition' => $maintenance['reported_condition'],
                                'contractor' => $maintenance['contractor'],
                                'priority' => $maintenance['priority'],
                                'element_date' => date('Y-m-d',strtotime($maintenance['element_date'])),
                                'type' => 'check'
                    ]);
                    
                    $newMaintenanceProgram = Maintenance::create([
                                'council_id' => $request->council_id,
                                'user_id' => $user->id,
                                'group_id' => $groupId,
                                'date' => $date,
                                'name' => $maintenance['name'],
                                'reported_condition' => $maintenance['reported_condition'],
                                'contractor' => $maintenance['contractor'],
                                'priority' => $maintenance['priority'],
                                'element_date' => date('Y-m-d',strtotime($maintenance['element_date'])),
                                'type' => 'program'
                    ]);
                    
                    $newMaintenanceCheck->save();
                    $newMaintenanceProgram->save();
                    
                } else {

                    $newMaintenanceCheck = Maintenance::create([
                                'council_id' => $request->council_id,
                                'user_id' => $user->id,
                                'group_id' => $groupId,
                                'date' => $date,
                                'name' => $maintenance['name'],
                                'reported_condition' => $maintenance['reported_condition'],
                                'contractor' => $maintenance['contractor'],
                                'priority' => $maintenance['priority'],
                                'element_date' => date('Y-m-d',strtotime($maintenance['element_date'])),
                                'type' => 'check'
                    ]);
                    $newMaintenanceCheck->save();
                }
            }
            
        } else {
            $newMaintenance = Maintenance::create([
                        'council_id' => $request->council_id,
                        'user_id' => $user->id,
                        'group_id' => $groupId,
                        'date' => $date,
                        'type' => 'check'
                ]);
            $newMaintenance->save();
        }

        return redirect('admin/maintenance');
    }
    
    /**
     * Shows form for editing maintenance.
     *
     * @param int $maintenance_id
     * @return view(admin/maintenance/edit) w form(admin/forms/maintenance)
     */
    public function edit($groupId)
    {
        $maintenancesInGroup = Maintenance::where('group_id', '=', $groupId)->get();
        dd($maintenancesInGroup);
        $oneMaintenance = Maintenance::where('group_id', '=', $groupId)->first();
        //dd($oneMaintenance);
        $councils = Council::all();
        $user = Auth::user();
        $userOfMaintenance = User::find($oneMaintenance->user_id);
        $userName = $userOfMaintenance->name;
        //$all_elements = Maintenance::
        //dd($user);

        return view ('admin.maintenance.edit', ['active' => 'addMaintenance', 'one_maintenance' => $oneMaintenance, 'councils' => $councils, 'user' => $user, 'user_name' => $userName, 'maintenances_in_group' => $maintenancesInGroup]);
    }
    
    /**
     * Stores data from maintenance form
     *
     * @param Request $request
     * @return redirect(admin/maintenance)
     */
    public function update(Request $request) 
    {   
        
        $id = $request->maintenance_id;
        
        $maintenance = Maintenance::find($id);
        
        $maintenance->update($request->all());
        
        Session::flash('message', 'success_'.__('Analiza je uređena!'));

        return redirect('admin/maintenance');
        
    }
    
    /**
     * Deletes all maintenances in the same group
     *
     * @param string $group_id
     * @return redirect(admin/maintenance)
     */
    public function delete($group_id)
    {
        $maintenances = Maintenance::where('group_id', '=', $group_id);
        
        foreach ($maintenances as $maintenance){
            
            $maintenance->delete();
            
        }
        
        Session::flash('message', 'info_'.__('Analiza je obrisana!'));
        
        return redirect('admin/maintenance');
    }
    
}
