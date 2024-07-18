<?php

namespace App\Http\Controllers\Stores;

use App\Http\Controllers\Controller;
use App\Http\Requests\Stores\StoreRequest;
use App\Http\Requests\Stores\UpdateStoreRequest;
use App\Models\Store;
use App\Models\Worker;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function index()
    {
        $stores = Store::get();        
        return view('app.stores.index',compact('stores'));
    }


    public function create()
    {
        $workers = Worker::get();
        return view('app.stores.create',compact('workers'));
    }


    public function store(StoreRequest $request)
    {
        $store = Store::create($request->all());
        $store -> workers()->sync($request->workers);

        return redirect()->route('show_stores')->with('success','Nueva sucursal registrada');
    }


    public function show(Store $store)
    {
       // $workers = Worker::get();
        $store->with('workers')->get();

        
        return view('app.stores.details',compact('store'));
     
    }


    public function edit(Store $store)
    {
        $workers = Worker::get();
        return view('app.stores.edit',compact('workers','store'));
    }


    public function update(UpdateStoreRequest $request, Store $store)
    {
        $store->workers()->sync($request->workers);
        $store->update($request->all());
        

        return redirect()->route('show_stores')->with('success','Datos actualizados');
    }


    public function destroy(Store $store)
    {
        $store->delete();
        return redirect()->route('show_stores')->with('success','Datos actualizados');
    }

    public function distance(Request $request, Store $store, Worker $worker){
       foreach($request->workers as $workerId => $data){
            if( $data['distance'] <= 0 || $data['distance'] >= 50){
                return redirect()->back()->with('error','La distancia ingresada no puede ser menor/igual a 0, ni mayor/igual a 50');
            }
            $store->workers()->updateExistingPivot($workerId, ['distance' => $data['distance']]);
       }
       return redirect()->back()->with('success','Datos actualizados correctamente');
    }
}
