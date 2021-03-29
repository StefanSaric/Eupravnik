<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Enforcer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EnforcersController extends Controller
{
    /**
     * Shows table with all enforcers.
     *
     * @return view(admin/enforcers/allenforcers)
     */
    public function index()
    {
        $enforcers = Enforcer::all();

        return view('admin.enforcers.allenforcers', ['active' => 'allEnforcers', 'enforcers' => $enforcers]);
    }

    /**
     * Shows form for inserting new enforcer.
     *
     * @return view(admin/enforcers/create) w form(admin/forms/enforcers)
     */
    public function create ()
    {
        return view('admin.enforcers.create', ['active' => 'addEnforcer']);
    }

    /**
     * Stores data from enforcers form
     *
     * @param Request $request
     * @return redirect(admin/enforcers)
     */
    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:50',
            'email' => 'required|unique:enforcers|email',
            'phone' => 'max:50',
            'address' => 'max:255',
            'city' => 'required|max:50',
            'postcode' => 'max:50',
            'account' => 'max:50',
            'pib' => 'max:50',
            'maticni' => 'max:50',
            'br_resenja' => 'required|max:50',
            'status' => ''
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput($request->input());
        }
        
        $enforcer = Enforcer::create($request->all());
        $enforcer->save();
        
        Session::flash('message', 'success_'.__('Izvršitelj je dodat!'));
        
        return redirect('admin/enforcers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enforcer  $enforcer
     * @return \Illuminate\Http\Response
     */
    public function show(Enforcer $enforcer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enforcer  $enforcer
     * @return \Illuminate\Http\Response
     */
    public function edit(Enforcer $enforcer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enforcer  $enforcer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enforcer $enforcer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enforcer  $enforcer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enforcer $enforcer)
    {
        //
    }
}

