<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $partners = Partner::where('partners.user_id', '=' , Auth::user()->id)->get();

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
            'partner_code' => 'max:50',
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
     * Shows form for editing enforcer.
     *
     * @param int $partner_id
     * @return view(admin/partners/edit) w form(admin/forms/partners)
     */
    public function edit($id)
    {
        $partner = Partner::find($id);

        return view ('admin.partners.edit', ['active' => 'addPartner', 'partner' => $partner]);
    }

    /**
     * Stores data from partners form
     *
     * @param Request $request
     * @return redirect(admin/partners)
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'partner_code' => 'max:50',
            'name' => 'required|max:50',
            'email' => 'required|email|unique:partners,email,' . $request->partner_id,
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

        $id = $request->partner_id;
        $partner = Partner::find($id);
        $partner->update($request->all());

        Session::flash('message', 'success_'.__('Partner je uređen!'));

        return redirect('admin/partners');

    }

    /**
     * Deletes partner
     *
     * @param int $partner_id
     * @return redirect(admin/partners)
     */
    public function delete($id)
    {
        $partner = Partner::find($id);
        $partner->delete();

        Session::flash('message', 'info_'.__('Partner je obrisan!'));

        return redirect('admin/partners');
    }
}
