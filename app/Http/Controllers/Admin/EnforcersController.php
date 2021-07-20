<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Enforcer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $enforcers = Enforcer::where('enforcers.user_id', '=', Auth::user()->id)->get();

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

        $request->merge(array('user_id' => Auth::user()->id));
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
     * Shows form for editing enforcer.
     *
     * @param int $enforcer_id
     * @return view(admin/enforcers/edit) w form(admin/forms/enforcers)
     */
    public function edit($id)
    {
        $enforcer = Enforcer::find($id);

        return view ('admin.enforcers.edit', ['active' => 'addEnforcer', 'enforcer' => $enforcer]);
    }

    /**
     * Stores data from enforcers form
     *
     * @param Request $request
     * @return redirect(admin/enforcers)
     */
    public function update(Request $request)
    {
        //dd($request);
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:50',
            'email' => 'required|email|unique:enforcers,email,' . $request->enforcer_id,
            'phone' => 'required|max:50',
            'address' => 'required|max:255',
            'city' => 'required|max:50',
            'postcode' => 'required|max:50',
            'account' => 'required|max:50',
            'pib' => 'required|max:50',
            'maticni' => 'required|max:50',
            'br_resenja' => 'required|max:50',
            'status' => ''
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput($request->input());
        }

        //dd($request);
        $id = $request->enforcer_id;
        //dd($id);
        $enforcer = Enforcer::find($id);
        //dd($enforcer);
        $enforcer->update($request->all());

        Session::flash('message', 'success_'.__('Izvršitelj je uređen!'));

        return redirect('admin/enforcers');

    }

    /**
     * Deletes enforcer
     *
     * @param int $enforcer_id
     * @return redirect(admin/enforcers)
     */
    public function delete($id)
    {
        $enforcer = Enforcer::find($id);
        $enforcer->delete();

        Session::flash('message', 'info_'.__('Izvršitelj je obrisan!'));

        return redirect('admin/enforcers');
    }
}

