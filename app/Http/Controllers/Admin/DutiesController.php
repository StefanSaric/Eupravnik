<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Duty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DutiesController extends Controller
{
    /**
     * Shows table with all duties.
     *
     * @return view(admin/duties/allduties)
     */
    public function index()
    {
        $duties = Duty::all();

        return view('admin.duties.allduties', ['active' => 'allDuties', 'duties' => $duties]);
    }

    /**
     * Shows form for inserting new duty.
     *
     * @return view(admin/duties/create) w form(admin/forms/duties)
     */
    public function create ()
    {
        return view('admin.duties.create', ['active' => 'addDuty']);
    }

    /**
     * Stores data from enforcers form
     *
     * @param Request $request
     * @return redirect(admin/enforcers)
     */
    public function store(Request $request) 
    {
        //dd($request->time_from);
        if($request->is_private != null){
            $isPrivate = true;
        }else{
            $isPrivate = false;
        }
        
        $duty = Duty::create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'date_from' => date('Y-m-d', strtotime($request->date_from)),
                    'time_from' => $request->time_from,
                    'date_to' => date('Y-m-d', strtotime($request->date_to)),
                    'time_to' => $request->time_to,
                    'is_private' => $isPrivate
        ]);
        //dd($duty);
        $duty->save();
        
        Session::flash('message', 'success_'.__('Obaveza je dodata!'));
        
        return redirect('admin/duties');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $duty = Duty::find($id);
        
        return view ('admin.duties.oneduty', ['active' => 'allDuties', 'duty' => $duty]);
    }

    /**
     * Shows form for editing duty.
     *
     * @param int $duty_id
     * @return view(admin/duties/edit) w form(admin/forms/duties)
     */
    public function edit($id)
    {
        $duty = Duty::find($id);

        return view ('admin.duties.edit', ['active' => 'addDuty', 'duty' => $duty]);
    }
    
    /**
     * Stores data from duties form
     *
     * @param Request $request
     * @return redirect(admin/duties)
     */
    public function update(Request $request) 
    {   
        //dd($request);
        $id = $request->duty_id;
        //dd($id);
        $duty = Duty::find($id);
        
        //dd($request->time_from);
        if($request->is_private != null){
            $isPrivate = true;
        }else{
            $isPrivate = false;
        }
        
        $duty->name = $request->name;
        $duty->description = $request->description;
        $duty->date_from = date('Y-m-d', strtotime($request->date_from));
        $duty->time_from = $request->time_from;
        $duty->date_to = date('Y-m-d', strtotime($request->date_to));
        $duty->time_to = $request->time_to;
        $duty->is_private = $isPrivate;
        
        //dd($duty);
        $duty->save();
       
        Session::flash('message', 'success_'.__('Obaveza je uređena!'));

        return redirect('admin/duties');
        
    }

    /**
     * Deletes duty
     *
     * @param int $duty_id
     * @return redirect(admin/duties)
     */
    public function delete($id)
    {
        $duty = Duty::find($id);
        $duty->delete();
        
        Session::flash('message', 'info_'.__('Obaveza je obrisana!'));
        
        return redirect('admin/duties');
    }
}

