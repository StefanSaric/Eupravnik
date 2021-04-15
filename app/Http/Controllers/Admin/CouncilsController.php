<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Council;
use App\CouncilAddress;
use Illuminate\Support\Facades\Validator;
use Auth;

class CouncilsController extends Controller
{
    /**
     * Shows table with all roles.
     *
     * @return view(admin/roles/allcouncils)
     */
    public function index()
    {
        $councils = Council::where('user_id', '=', Auth::user()->id);

        return view('admin.councils.allcouncils', ['active' => 'allCouncils', 'councils' => $councils]);
    }
    
    public function show($id)
    {
        $council = Council::find($id);
        $addresses = CouncilAddress::where('council_id', '=', $id)->get();
        $acttab = 'addresses';
        
        return view('admin.councils.show', ['active' => 'allCouncils', 'council' => $council, 'addresses' => $addresses, 'acttab' => $acttab]);
    }
    
    /**
     * Shows form for inserting new council.
     *
     * @return view(admin/councils/create) w form(admin/forms/councils)
     */
    public function create ()
    {
        return view('admin.councils.create', ['active' => 'addCouncil']);
    }
    
    /**
     * Stores data from councils form
     *
     * @param Request $request
     * @return redirect(admin/councils)
     */
    public function store(Request $request) 
    {
        $council = Council::create(['name' => $request->name, 'short_name' => $request->short_name, 'city' => $request->city, 'area' => $request->area,
            'account' => $request->account, 'maticni' => $request->maticni, 'latitude' => $request->latitude, 'longitude' => $request->longitude, 'pib' => $request->pib,
            'phone' => $request->phone]);
        $council->save();
        $address = CouncilAddress::create([]);
        
        Session::flash('message', 'success_'.__('Skupština je dodata!'));
        
        return redirect('admin/councils');
    }
    
    /**
     * Shows form for editing council.
     *
     * @param int $council_id
     * @return view(admin/councils/edit) w form(admin/forms/councils)
     */
    public function edit($id)
    {
        $council = Council::find($id);

        return view ('admin.councils.edit', ['active' => 'addCouncil', 'council' => $council]);
    }
    
    /**
     * Stores data from councils form
     *
     * @param Request $request
     * @return redirect(admin/councils)
     */
    public function update(Request $request) 
    {   
        //dd($request);
        $id = $request->role_id;
        $council = Council::find($id);
        $council->update($request->all());
        
        Session::flash('message', 'success_'.__('Skupština je uređena!'));

        return redirect('admin/roles');
        
    }
    
    /**
     * Deletes role =!!!! INACTIVE FUNCTION !!!!=
     *
     * @param int $council_id
     * @return redirect(admin/roles)
     */
    public function delete($id)
    {
        $council = Council::find($id);
        $council->delete();
        
        Session::flash('message', 'info_'.__('Skupština je obrisana!'));
        
        return redirect('admin/councils');
    }
    
    public function addAddress($id)
    {
        
    }
    
    public function storeAddress(Request $request)
    {
        
    }
    
    public function editAddress($id)
    {
        
    }
    
    public function updateAddress(Request $request)
    {
        
    }
    
    public function addUnit($id)
    {
        
    }
}