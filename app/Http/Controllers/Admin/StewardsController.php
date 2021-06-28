<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Steward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class StewardsController extends Controller
{
    public function index () {

        $stewards = Steward::where('firm_id', '=', Auth::user()->id)->get();

        return view('admin.stewards.allstewards', ['active' => 'allStewards', 'stewards' => $stewards]);
    }

    public function create () {

        return view('admin.stewards.create', ['active' => 'addSteward']);

    }

    public function store (Request $request) {

        //dd($request->all());

        $validator = Validator::make($request->all(),[
            'name' => ['required', 'unique:firms'],
            'email' => ['required', 'unique:firms'],
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $user = User::create(['name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->input('password'))]);
        $user->roles()->attach(1);
        $user->save();

        $steward = Steward::create([
            'id' => $request->id,
            'user_id' => $user->id,
            'firm_id' => Auth::user()->id,
            'name' => $request->name,
            'last_name' => $request->last_name,
            'jmbg' => $request->jmbg,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'address' => $request->address,
            'licence' => $request->licence,
            'account' => $request->account,
        ]);

        return redirect('admin/stewards');
    }

    public function edit ($id) {

        $steward = Steward::find($id);

        return view ('admin.stewards.edit', ['active' => 'addSteward', 'steward' => $steward]);
    }

    public function update (Request $request) {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $steward = Steward::find($request->id);
        $steward->update($request->all());

        $user = User::find($request->user_id);
        $user->update($request->except(['password']));
        if(isset($request->password) && $request->password != ''){
            $user->password = bcrypt($request->input('password'));
            $user->save();
        }

        Session::flash('message', 'success_'.__('Upravnik je izmenjena!'));

        return redirect('admin/stewards');
    }

    public function delete ($id) {

        $steward = Steward::find($id);
        $user = User::find($steward->user_id);

        $user->delete();
        $steward->delete();

        Session::flash('message', 'info_'.__('Upravnik je izbrisan!'));

        return redirect('admin/stewards');
    }
}
