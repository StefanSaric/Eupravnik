<?php

namespace App\Http\Controllers\Admin;

use App\Council;
use App\CouncilAddress;
use App\Enforcer;
use App\Http\Controllers\Controller;
use App\Lawsuit;
use App\Partner;
use App\Space;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LawsuitsController extends Controller
{
    public function index () {

        $lawsuits = Lawsuit::join('councils', 'councils.id', '=', 'lawsuits.council_id')
            ->join('partners', 'partners.id', '=', 'lawsuits.partner_id')
            ->join('enforcers', 'enforcers.id', '=', 'lawsuits.enforcer_id')
            ->where('lawsuits.user_id', '=', Auth::user()->id)
            ->select('lawsuits.id as id',
                'councils.name as council_name',
                'partners.name as partner_name',
                'enforcers.name as enforcer_name',
                'lawsuits.date_from as date_from',
                'lawsuits.date_to as date_to',
                'lawsuits.price as price',
                'lawsuits.status as status')
            ->get();

        return view('admin.lawsuits.alllawsuits', ['active' => 'allLawsuits', 'lawsuits' => $lawsuits]);
    }

    public function create (){
        $councils = Council::where('user_id', '=', Auth::user()->id)->get();
        $enforcers = Enforcer::where('user_id', '=', Auth::user()->id)->get();


        return view('admin.lawsuits.create', ['active' => 'addLawsuit', 'councils' => $councils, 'enforcers' => $enforcers]);
    }

    public function getaddress ($id, $type) {
        $data = [];
        if($type == 1) {
            $data = CouncilAddress::where('council_id', '=', $id)->get();
        } else {
            $data = Space::where('council_address_id', '=', $id)->get();
        }
        return response()->json(compact('data'));
    }


    public function store (Request $request) {

        $validator = Validator::make($request->all(),[
            'council_id' => 'required',
            'partner_id' => 'required',
            'enforcer_id' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        //lodd($request->all());
        $lawsuit = Lawsuit::create([
            'user_id' => Auth::user()->id,
            'council_id' => $request->council_id,
            'partner_id' => $request->partner_id,
            'enforcer_id' => $request->enforcer_id,
            'date_from' => date("Y-m-d", strtotime($request->date_from)),
            'date_to' => date("Y-m-d", strtotime($request->date_to)),
            'price' => $request->price,
            'status' => $request->status]);

        return redirect('admin/lawsuits');
    }

    public function onelawsuit($id)
    {
        //dd($id);
        $lawsuit = Lawsuit::join('councils', 'councils.id', '=', 'lawsuits.council_id')
            ->join('partners', 'partners.id', '=', 'lawsuits.partner_id')
            ->join('enforcers', 'enforcers.id', '=', 'lawsuits.enforcer_id')
            ->where('lawsuits.id','=',$id)
            ->select('lawsuits.id as id',
                'councils.name as council_name',
                'partners.name as partner_name',
                'enforcers.name as enforcer_name',
                'lawsuits.date_from as date_from',
                'lawsuits.date_to as date_to',
                'lawsuits.price as price',
                'lawsuits.status as status')
            ->first();
        //dd($lawsuit);

        return view('admin.lawsuits.onelawsuit', ['active' => 'allLawsuits', 'lawsuit' => $lawsuit]);
    }

    public function edit($id)
    {
        $lawsuit = Lawsuit::find($id);
        $councils = Council::where('user_id', '=', Auth::user()->id)->get();
        $partners = Partner::where('user_id', '=', Auth::user()->id)->get();
        $enforcers = Enforcer::where('user_id', '=', Auth::user()->id)->get();

        return view ('admin.lawsuits.edit', ['active' => 'addLawsuit', 'lawsuit' => $lawsuit, 'councils' => $councils, 'partners' => $partners, 'enforcers' => $enforcers ]);
    }

    public function update(Request $request)
    {
        $id = $request->lawsuit_id;
        $lawsuit = Lawsuit::find($id);
        $lawsuit->update($request->all());


        return redirect('admin/lawsuits');
    }

    public function delete($id)
    {
        $lawsuit = Lawsuit::find($id);
        $lawsuit->delete();

        Session::flash('message', 'info_'.__('Tuzba je obrisana!'));

        return redirect('admin/lawsuits');

    }
}
