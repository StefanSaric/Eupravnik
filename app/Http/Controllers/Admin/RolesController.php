<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Role;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    /**
     * Shows table with all roles.
     *
     * @return view(admin/roles/allroles)
     */
    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.allroles2', ['active' => 'allRoles', 'roles' => $roles]);
    }
    
    /**
     * Shows form for inserting new role.
     *
     * @return view(admin/roles/create) w form(admin/forms/roles)
     */
    public function create ()
    {
        return view('admin.roles.create', ['active' => 'addRole']);
    }
    
    /**
     * Stores data from roles form
     *
     * @param Request $request
     * @return redirect(admin/roles)
     */
    public function store(Request $request) 
    {
        $role = Role::create($request->all());
        $role->save();
        
        Session::flash('message', 'success_'.__('Rola je dodata!'));
        
        return redirect('admin/roles');
    }
    
    /**
     * Shows form for editing role.
     *
     * @param int $role_id
     * @return view(admin/roles/edit) w form(admin/forms/roles)
     */
    public function edit($id)
    {
        $role = Role::find($id);

        return view ('admin.roles.edit', ['active' => 'addRole', 'role' => $role]);
    }
    
    /**
     * Stores data from roles form
     *
     * @param Request $request
     * @return redirect(admin/roles)
     */
    public function update(Request $request) 
    {   
        //dd($request);
        $id = $request->role_id;
        $role = Role::find($id);
        $role->update($request->all());
        
        Session::flash('message', 'success_'.__('Rola je uređena!'));

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
        $role = Role::find($id);
        $role->delete();
        
        Session::flash('message', 'info_'.__('Rola je obrisana!'));
        
        return redirect('admin/roles');
    }
}