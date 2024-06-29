<?php

namespace App\Http\Controllers\Workers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Workers\UpdateWorkerRequest;
use App\Http\Requests\Workers\WorkerRequest;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{

    public function index(){
        $workers = Worker::get();
        return view('app.workers.index',compact('workers'));
    }

    public function create()
    {
      return view('app.workers.create');
    }


    public function store(WorkerRequest $request)
    {
        $worker = Worker::create($request->all());
        return redirect()->route('show_workers',$worker)->with('success','Colaborador agregado correctamente');
    }


    public function show()
    {
        //
    }


    public function edit(Worker $worker)
    {
        return view('app.workers.edit', compact('worker'));
    }


    public function update(UpdateWorkerRequest $request, Worker $worker)
    {
        $worker->update($request->all());
        return redirect()->route('show_workers')->with('success','Datos actualizados correctamente');
    }


    public function destroy(Worker $worker)
    {
       $worker->delete();
       return redirect()->route('show_workers')->with('success','Datos actualizados');
    }
}
