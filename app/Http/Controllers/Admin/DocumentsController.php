<?php

namespace App\Http\Controllers\Admin;

use App\Document;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function index ()
    {
        $documents = Document::all();

        return view ('admin.documents.alldocuments',['active' => 'allDocuments', 'documents' => $documents]);
    }
}
