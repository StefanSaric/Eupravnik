<?php

namespace App\Http\Controllers\Admin;

use App\Document;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DocumentsController extends Controller
{
    public function index ()
    {
        $documents = Document::where('documents.user_id', '=', Auth::user()->id)->get();

        return view ('admin.documents.alldocuments',['active' => 'allDocuments', 'documents' => $documents]);
    }

    public function create ($type,$id)
    {
        return view ('admin.documents.create',['active' => 'allDocuments','id' => $id, 'type' => $type]);
    }

    public function store (Request $request)
    {
        $validator = Validator::make($request->all(),[
            'documents' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $document_id = 0;
        $path = 'documents/';
        if ($request->file('documents') != null) {
            foreach ($request->file('documents') as $document) {
                $document_id++;
                $document_path = public_path($path) . $document->getClientOriginalName();
                move_uploaded_file($document, $document_path);
                $url = $path. $document->getClientOriginalName();
                $one_document = Document::create(['user_id' => Auth::user()->id,'url' => $url, 'name' => $document->getClientOriginalName(), 'type' => $request->type, 'type_id' => $request->type_id]);
            }
        }

        Session::flash('message', 'success_'.__('Dokument je uspešno dodat!'));

        return redirect ('admin/documents');
    }

    public function delete ($id) {

        $document = Document::find($id);
        $document->delete();

        return redirect ('admin/documents');
    }
}
