<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\WorkersType;
use App\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class WorkersController extends Controller
{

    public function index () {

        $workers = Worker::join('workers_types', 'workers_types.id', '=', 'workers.type_id')
                ->where('workers.user_id', '=' , Auth::user()->id)
                ->select('workers.id as id',
                        'workers.first_name as name',
                        'workers.last_name as surname',
                        'workers_types.name as worker_type',
                        'workers.email as email',
                        'workers.telephone as telephone',
                        'workers.licence as licence')
                ->get();

        //dd($workers);
        //$workers = Worker::all();
        return view('admin.workers.allworkers', ['active' => 'allWorkers', 'workers' => $workers]);
    }

    public function create (){
        $types = WorkersType::all();
        return view('admin.workers.create', ['active' => 'addWorker', 'types' => $types]);
    }

    public function store (Request $request) {
        $worker = Worker::create(['email' => $request->email,
            //'password' => $request->password,
            //'password_confirm' => $request->password_confirm,
            'user_id' => Auth::user()->id,
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
        $worker = Worker::find($id);
        $types = WorkersType::all();

        return view ('admin.workers.edit', ['active' => 'addWorker', 'worker' => $worker, 'types' => $types ]);
    }

    public function update(Request $request)
    {
        $id = $request->worker_id;
        $worker = Worker::find($id);
        $worker->update($request->except(['password']));
        if(isset($request->password) && $request->password != ''){
            $worker->password = bcrypt($request->input('password'));
            $worker->save();
        }

        return redirect('admin/workers');

    }
}
