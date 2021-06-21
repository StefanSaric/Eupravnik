<?php

namespace App\Http\Controllers\Admin;

use App\Firm;
use App\Http\Controllers\Controller;
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

        $firm = Firm::create([
            'id' => $request->id,
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'post' => $request->post,
            'phone' => $request->phone,
            'email' => $request->email,
            'pib' => $request->pib,
            'id_number' => $request->id_number,
            'account' => $request->account,
            'code' => $request->code,
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

        Session::flash('message', 'success_'.__('Firma je izmenjena!'));

        return redirect('admin/firms');
    }

    public function delete ($id) {

        $firm = Firm::find($id);
        $firm->delete();

        Session::flash('message', 'info_'.__('Firma je obrisana!'));

        return redirect('admin/firms');
    }
}
