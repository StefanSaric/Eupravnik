<?php

namespace App\Http\Controllers\Admin;

use App\Document;
use App\Http\Controllers\Controller;
use App\Offer;
use App\Partner;
use App\Maintenance;
use App\Council;
use Auth;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OffersController extends Controller
{
    public function index () {
        // ove treba napraviti funkciju koja vraca sve ponude (offere), koji pripadaju Maintenanceu iz koga se kreiraju
    }

    public function create ($programId){
        
        $program = Maintenance::where('id', '=', $programId)->first();
        $elementName = $program->name;
        
        $council = Council::where('id', '=', $program->council_id)->first();
        $councilName = $council->name;
        
        $partners = Partner::all();
        $documents = Document::all();
        return view('admin.offers.create', ['active' => 'addOffer', 'program_id' => $programId, 'partners' => $partners,
                    'documents' => $documents, 'element_name' => $elementName, 'council_name' => $councilName]);
    }

    public function store (Request $request) {
        //dd($request->all());

        $offer = Offer::create([
            'program_id' => $request->program_id,
            'partner_id' => $request->partner_id,
            'date' =>  date("Y-m-d", strtotime($request->date)),
            'price' => $request->price,
            'description' => $request->description]);

        $now = time();
        $document_id = 0;
        $path = 'documents/offer/' . $offer->id;
        if ($request->file('documents') != null) {
            foreach ($request->file('documents') as $document) {
                $document_id++;
                $document_path = public_path($path) . '/dokument_' . $document_id . $now . '.' . $document->getClientOriginalExtension();
                if (!is_dir(dirname($document_path))) {
                    mkdir(dirname($document_path), 0777, true);
                }
                move_uploaded_file($document, $document_path);
                //File::make($document->getRealPath())->save(public_path($path) . '/dokument_' . $document_id . $now . '.' . $document->getClientOriginalExtension());
                $url = $path . '/dokument_' . $document_id . $now . '.' . $document->getClientOriginalExtension();
                $one_document = Document::create(['offer_id' => $offer->id, 'url' => $url, 'name' => $document->getClientOriginalName()]);
            }
        }
        Session::flash('message', 'success_'.__('Ponuda je uspešno dodata!'));

        return redirect('admin/programs');
    }

    public function edit($id)
    {
        $offer = Offer::find($id);
        $partners = Partner::all();

        return view ('admin.offers.edit', ['active' => 'addOffer','offer' => $offer, 'partners' => $partners]);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $id = $request->offer_id;
        $offer = Offer::find($id);
        $offer->update($request->all());

        Session::flash('message', 'success_'.__('Ponuda je izmenjena!'));

        return redirect('admin/programs');
        // trebalo bi da se vraca na stranicu Maintenance->id
        // return redirect('admin/');

    }

    public function delete($id)
    {
        $offer = Offer::find($id);
        $offer->delete();

        Session::flash('message', 'info_'.__('Ponuda je obrisana!'));

        // trebalo bi da se vraca na stranicu Maintenance->id
        // return redirect('admin/');
    }
    
    public function accept($id)
    {
        $offer = Offer::find($id);
        $offer->status = 'assigned';
        $offer->save();
        $programme = Maintenance::find($offer->program_id);
        $programme->is_checked = 1;
        $programme->save();
        $partner = Partner::find($offer->partner_id);
        $assignment = Maintenance::create([
                'council_id' => $programme->council_id,
                'user_id' => Auth::user()->id,
                'date' => $offer->date,
                'name' => $programme->name.' - '.$offer->description,
                'contractor' => $partner->name,
                'type' => 'assignment',
                'status' => 1
            ]);
        Session::flash('acttab', 'assignments');
        
        return redirect('/admin/councils/show/'.$programme->council_id);
    }
}
