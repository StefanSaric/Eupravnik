<?php

namespace App\Http\Controllers\Admin;

use App\Council;
use App\CouncilAddress;
use App\Http\Controllers\Controller;
use App\Partner;
use App\Space;
use App\Warning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class WarningsController extends Controller
{
    public function index () {

        $warnings = Warning::join('councils', 'councils.id', '=', 'warnings.council_id')
            ->join('council_addresses', 'council_addresses.id', '=', 'warnings.address_id' )
            ->join('spaces', 'spaces.id', '=', 'warnings.space_id')
            ->where('warnings.user_id', '=', Auth::user()->id)
            ->select('warnings.id as id',
                'councils.name as council_name',
                'council_addresses.address as address_name',
                'spaces.representative as representative',
                'spaces.floor_number as floor_number',
                'spaces.apartment_number as apartment_number',
                'warnings.date_from as date_from',
                'warnings.date_to as date_to',
                'warnings.price as price',
                'warnings.status as status')
            ->get();

        return view('admin.warnings.allwarnings', ['active' => 'allWarnings', 'warnings' => $warnings]);
    }

    public function create (){
        $councils = Council::where('user_id', '=', Auth::user()->id)->get();
        return view('admin.warnings.create', ['active' => 'addWarning', 'councils' => $councils]);
    }

    public function getaddress ($id) {

        $data = CouncilAddress::where('council_id', '=', $id)->get();
        return response()->json(compact('data'));
    }

    public function getspaces ($id) {

        $data = Space::where('council_address_id', '=', $id)->get();
        return response()->json(compact('data'));
    }

    public function store (Request $request) {

        $validator = Validator::make($request->all(),[
            'council_id' => 'required',
            'address_id' => 'required',
            'space_id' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }


        // dd($request->all());
        $warning = Warning::create([
            'user_id' => Auth::user()->id,
            'council_id' => $request->council_id,
            'address_id' => $request->address_id,
            'space_id' => $request->space_id,
            'date_from' => date("Y-m-d", strtotime($request->date_from)),
            'date_to' => date("Y-m-d", strtotime($request->date_to)),
            'price' => $request->price,
            'status' => $request->status]);

        return redirect('admin/warnings');
    }

    public function onewarning ($id)
    {
        $warning = Warning::join('councils', 'councils.id', '=', 'warnings.council_id')
            ->join('council_addresses', 'council_addresses.id', '=', 'warnings.address_id' )
            ->join('spaces', 'spaces.id', '=', 'warnings.space_id')
            ->where('warnings.id','=',$id)
            ->select('warnings.id as id',
                'councils.name as council_name',
                'council_addresses.address as address_name',
                'spaces.representative as representative',
                'spaces.floor_number as floor_number',
                'spaces.apartment_number as apartment_number',
                'warnings.date_from as date_from',
                'warnings.date_to as date_to',
                'warnings.price as price',
                'warnings.status as status')
            ->first();

        return view('admin.warnings.onewarning', ['active' => 'allWarnings', 'warning' => $warning]);
    }


    public function edit($id)
    {
        $warning = Warning::find($id);
        $councils = Council::where('user_id', '=', Auth::user()->id)->get();
        $addresses = CouncilAddress::where('council_id', '=', $warning->council_id)->get();
        $spaces = Space::where('council_address_id', '=', $warning->address_id)->get();
        $partners = Partner::where('user_id', '=', Auth::user()->id)->get();

        return view ('admin.warnings.edit', ['active' => 'addWarning', 'warning' => $warning, 'councils' => $councils, 'partners' => $partners, 'addresses' => $addresses, 'spaces' => $spaces ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'council_id' => 'required',
            'address_id' => 'required',
            'space_id' => 'required',
            'price' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $id = $request->warning_id;
        $warning = Warning::find($id);
        $warning->update($request->all());

        return redirect('admin/warnings');

    }

    public function delete($id)
    {
        $warning = Warning::find($id);
        $warning->delete();

        Session::flash('message', 'info_'.__('Opomena je obrisana!'));

        return redirect('admin/warnings');
    }
}
