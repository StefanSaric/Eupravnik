<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Council;
use App\CouncilAddress;
use App\Maintenance;
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
        $councils = Council::where('user_id', '=', Auth::user()->id)->get();

        return view('admin.councils.allcouncils', ['active' => 'allCouncils', 'councils' => $councils]);
    }
    
    public function show($id)
    {
        $council = Council::find($id);
        $addresses = CouncilAddress::where('council_id', '=', $id)->get();
        $assignments = Maintenance::where('council_id', '=', $id)
                ->whereIn('type', ['assignment', 'intervention'])
                ->get();
        if(Session::has('acttab')){
            $acttab = Session::get('acttab');
            //dd($acttab);
        }
        else{
            $acttab = 'addresses';
        }
        
        return view('admin.councils.show', ['active' => 'allCouncils', 'acttab' => $acttab, 'council' => $council, 'addresses' => $addresses, 'assignments' => $assignments]);
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
        $council = Council::create(['user_id' => Auth::user()->id,'name' => $request->name, 'short_name' => $request->short_name, 'city' => $request->city, 'area' => $request->area,
            'account' => $request->account, 'maticni' => $request->maticni, 'latitude' => $request->latitude, 'longitude' => $request->longitude, 'pib' => $request->pib,
            'phone' => $request->phone]);
        $council->save();
        $address = CouncilAddress::create(['council_id' => $council->id,'address' => $request->ca_address, 'protection_status' => $request->protection_status,
            'area_size' => $request->area_size, 'built_year' => $request->built_year, 'short_name' => $request->ca_short_name, 'floors_number' => $request->floors_number,
            'elevators_number' => $request->elevators_number, 'roof_type' => $request->roof_type, 'lightning_rod' => $request->lightning_rod, 
            'district_heating' => $request->district_heating, 'cellar' => $request->cellar, 'attic' => $request->attic, 'shelter' => $request->shelter,
            'energy_passport' => $request->energy_passport]);
        
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
        $id = $request->council_id;
        $council = Council::find($id);
        $council->update($request->all());
        
        Session::flash('message', 'success_'.__('Skupština je uređena!'));

        return redirect('admin/councils');
        
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
        $council = Council::find($id);
        
        return view('admin.councils.addAddress', ['active' => 'allCouncils', 'council' => $council]);
    }
    
    public function storeAddress(Request $request)
    {
        $address = CouncilAddress::create($request->all());
        
        Session::flash('acttab', 'addresses');
        Session::flash('message', 'info_'.__('Adresa je dodata!'));
        
        return redirect('admin/councils/show/'.$request->council_id);
    }
    
    public function editAddress($id)
    {
        $address = CouncilAddress::find($id);
        $council = Council::find($address->council_id);
        
        return view('admin.councils.editAddress', ['active' => 'allCouncils', 'council' => $council, 'address' => $address]);
    }
    
    public function updateAddress(Request $request)
    {
        $address = CouncilAddress::find($request->council_address_id);
        $address->update($request->all());
        
        Session::flash('acttab', 'addresses');
        Session::flash('message', 'info_'.__('Adresa je uredjena!'));
        
        return redirect('admin/councils/show/'.$request->council_id);
    }
    
    public function deleteAddress($id)
    {
        $address = CouncilAddress::find($id);
        $council_id = $address->council_id;
        $alladdresses = CouncilAddress::where('council_id', '=', $address->council_id)->get();
        if(count($alladdresses) > 1){
            $address->delete();
            Session::flash('acttab', 'addresses');
            Session::flash('message', 'info_'.__('Adresa je obrisana!'));
        }
        else{
            Session::flash('acttab', 'addresses');
            Session::flash('message', 'info_'.__('Brisanje nije dozvoljeno, mora postojati bar jedna adresa!'));
        }
        
        return redirect('admin/councils/show/'.$council_id);
    }
    
    public function addUnit($id)
    {
        
    }
}