<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Council;
use App\CouncilAddress;
use Illuminate\Support\Facades\Validator;

class CouncilsController extends Controller
{
    /**
     * Shows table with all roles.
     *
     * @return view(admin/roles/allcouncils)
     */
    public function index()
    {
        $councils = Council::all();

        return view('admin.councils.allcouncils', ['active' => 'allCouncils', 'councils' => $councils]);
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
        $council = Council::create($request->all());
        $council->save();
        
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
     * @param int $role_id
     * @return redirect(admin/roles)
     */
    public function delete($id)
    {
        $council = Council::find($id);
        $council->delete();
        
        Session::flash('message', 'info_'.__('Skupština je obrisana!'));
        
        return redirect('admin/councils');
    }
}