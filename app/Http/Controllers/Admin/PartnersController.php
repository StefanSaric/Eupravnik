<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PartnersController extends Controller
{
    /**
     * Shows table with all partners.
     *
     * @return view(admin/partners/allpartners)
     */
    public function index()
    {
        $partners = Partner::all();

        return view('admin.partners.allpartners', ['active' => 'allPartners', 'partners' => $partners]);
    }

    /**
     * Shows form for inserting new partner.
     *
     * @return view(admin/partners/create) w form(admin/forms/partners)
     */
    public function create ()
    {
        return view('admin.partners.create', ['active' => 'addPartner']);
    }

    /**
     * Stores data from partners form
     *
     * @param Request $request
     * @return redirect(admin/partners)
     */
    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(),[
            'partner_id' => 'max:50',
            'name' => 'required|max:50',
            'email' => 'required|unique:partners|email',
            'phone' => 'max:50',
            'address' => 'max:255',
            'city' => 'required|max:50',
            'postcode' => 'max:50',
            'account' => 'max:50',
            'pib' => 'max:50',
            'maticni' => 'max:50',
            'status' => ''
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput($request->input());
        }
        
        $partner = Partner::create($request->all());
        $partner->save();
        
        Session::flash('message', 'success_'.__('Partner je dodat!'));
        
        return redirect('admin/partners');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        //
    }
}
