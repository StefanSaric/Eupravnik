<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Role;
use Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Shows table with all users.
     *
     * @return view(admin/users/allusers)
     */
    public function index()
    {
        $users = User::join('user_roles', 'user_roles.user_id', '=', 'users.id')
                ->where('user_roles.role_id', '=', 1)
                ->select('users.id as id', 'users.name as name', 'users.email as email', 'users.password as password')
                ->get();

        return view('admin.users.allusers', ['active' => 'allUsers', 'users' => $users]);
    }
    
    /**
     * Shows form for inserting new user.
     *
     * @return view(admin/users/create) w form(admin/forms/users)
     */
    public function create ()
    {
        
        return view('admin.users.create', ['active' => 'addUser']);
    }
    
    /**
     * Stores data from users form
     *
     * @param Request $request
     * @return redirect(admin/users)
     */
    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => ['required', 'unique:users'],
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput($request->input());
        }
        //setting encription for password
        $request->merge(array('password' => bcrypt($request->input('password'))));
        $user = User::create($request->all());
        $user->roles()->attach(1);
        $user->save();
        
        Session::flash('message', 'success_'.__('Korisnik je dodat!'));
        
        return redirect('admin/users');
    }
    
    /**
     * Shows form for editing user.
     *
     * @param int $user_id
     * @return view(admin/users/edit) w form(admin/forms/users)
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view ('admin.users.edit', ['active' => 'addUser', 'user' => $user]);
    }
    
    /**
     * Stores data from users form
     *
     * @param Request $request
     * @return redirect(admin/users)
     */
    public function update(Request $request) 
    {   
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => ['required', 'unique:users,email,'.$request->user_id],
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput($request->input());
        }
        $id = $request->user_id;
        $user = User::find($id);
        $user->update($request->except(['password']));
        if(isset($request->password) && $request->password != ''){
            $user->password = bcrypt($request->input('password'));
            $user->save();
        }

        Session::flash('message', 'success_'.__('Korisnik je uređen!'));

        return redirect('admin/users');
        
    }
    
    /**
     * Deletes user =!!!! INACTIVE FUNCTION !!!!=
     *
     * @param int $user_id
     * @return redirect(admin/users)
     */
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        
        Session::flash('message', 'info_'.__('Korisnik je obrisan!'));
        
        return redirect('admin/users');
    }
}