<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Worker_Types;
use App\Workers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class WorkersController extends Controller
{

    public function index () {
        $workers = Workers::all();
        return view('admin.workers.allworkers', ['active' => 'allWorkers', 'workers' => $workers]);
    }

    public function create (){
        $types = Worker_Types::all();
        return view('admin.workers.create', ['active' => 'addWorker', 'types' => $types]);
    }

    public function store (Request $request) {
        $worker = Workers::create(['email' => $request->email,
            'password' => $request->password,
            'password_confirm' => $request->password_confirm,
            'type_id' => $request->type_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'telephone' => $request->telephone,
            'licence' => $request->licence]);

        return redirect('admin/workers');
    }

    public function edit($id)
    {
        $worker = Workers::find($id);
        $types = Worker_Types::all();

        return view ('admin.workers.edit', ['active' => 'addWorker', 'worker' => $worker, 'types' => $types ]);
    }

    public function update(Request $request)
    {
        $id = $request->worker_id;
        $worker = Workers::find($id);
        $worker->update($request->except(['password']));
        if(isset($request->password) && $request->password != ''){
            $worker->password = bcrypt($request->input('password'));
            $worker->save();
        }

        return redirect('admin/workers');

    }
}
