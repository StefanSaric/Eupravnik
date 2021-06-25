<?php

namespace App\Http\Controllers\Admin;

use App\Firm;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FirmsController extends Controller
{
    public function index () {
        $firms = Firm::all();

        return view ('admin.firms.allfirms', ['active' => 'allFirms', 'firms' => $firms]);
    }

    public function create () {

        return view ('admin.firms.create', ['active' => 'addFirm']);


    }

    public function store (Request $request) {

        $user = User::create(['name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->input('password'))]);
        $user->roles()->attach(2);
        $user->save();

        $firm = Firm::create([
            'id' => $request->id,
            'user_id' => $user->id,
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'post' => $request->post,
            'phone' => $request->phone,
            'email' => $request->email,
            'pib' => $request->pib,
            'id_number' => $request->id_number,
            'account' => $request->account,
            'password' => $request->password,
            'percentage' => $request->percentage,
        ]);

        return redirect('admin/firms');
    }

    public function edit ($id) {

        $firm = Firm::find($id);

        return view ('admin.firms.edit', ['active' => 'addFirm', 'firm' => $firm]);
    }

    public function update (Request $request) {

        $firm = Firm::find($request->id);
        $firm->update($request->all());

        $user = User::find($request->user_id);
        //dd($user);
        $user->update($request->except(['password']));
        if(isset($request->password) && $request->password != ''){
            $user->password = bcrypt($request->input('password'));
            $user->save();
        }

        Session::flash('message', 'success_'.__('Firma je izmenjena!'));

        return redirect('admin/firms');
    }

    public function delete ($id,$user_id) {

        $firm = Firm::find($id);
        $firm->delete();

        $user = User::find($user_id);
        $user->delete();

        Session::flash('message', 'info_'.__('Firma je obrisana!'));

        return redirect('admin/firms');
    }
}
