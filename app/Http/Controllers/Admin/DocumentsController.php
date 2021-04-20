<?php

namespace App\Http\Controllers\Admin;

use App\Document;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DocumentsController extends Controller
{
    public function index ()
    {
        $documents = Document::all();

        return view ('admin.documents.alldocuments',['active' => 'allDocuments', 'documents' => $documents]);
    }

    public function create ($type,$id)
    {
        return view ('admin.documents.create',['active' => 'allDocuments','id' => $id, 'type' => $type]);
    }

    public function store (Request $request)
    {

        $document_id = 0;
        $path = 'documents/'. $request->type;
        if ($request->file('documents') != null) {
            foreach ($request->file('documents') as $document) {
                $document_id++;
                $document_path = public_path($path) . $document->getClientOriginalExtension();
                move_uploaded_file($document, $document_path);
                $url = $path . $document->getClientOriginalExtension();
                $one_document = Document::create(['url' => $url, 'name' => $document->getClientOriginalName(), 'type' => $request->type, 'type_id' => $request->type_id]);
            }
        }

        Session::flash('message', 'success_'.__('Dokument je uspešno dodat!'));

        return redirect ('admin/documents');
    }
}
