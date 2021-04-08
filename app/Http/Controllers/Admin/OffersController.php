<?php

namespace App\Http\Controllers\Admin;

use App\Document;
use App\Http\Controllers\Controller;
use App\Offer;
use App\Partner;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OffersController extends Controller
{
    public function index () {
        // ove treba napraviti funkciju koja vraca sve ponude (offere), koji pripadaju Maintenanceu iz koga se kreiraju
    }

    public function create (){
        $partners = Partner::all();
        $documents = Document::all();
        return view('admin.offers.create', ['active' => 'addOffer', 'partners' => $partners, 'documents' => $documents]);
    }

    public function store (Request $request) {
        dd($request->all());

        $offer = Offer::create([
            'maintenance_id' => $request->email,
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
                $one_document = Document::create(['offer_id' => $offer->id, 'url' => $url]);
            }
        }


        return redirect('admin/offers');
    }

    public function edit($id)
    {
        $offer = Offer::find($id);

        return view ('admin.offers.edit', ['active' => 'addOffer','offer' => $offer]);
    }

    public function update(Request $request)
    {

        $id = $request->id;
        $offer = Offer::find($id);
        $offer->update($request->all());

        Session::flash('message', 'success_'.__('Ponuda je izmenjena!'));

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
}
