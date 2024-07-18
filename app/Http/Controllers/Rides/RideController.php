<?php

namespace App\Http\Controllers\Rides;

use App\Http\Controllers\Controller;
use App\Models\Ride;
use App\Models\Driver;
use App\Models\Store;
use App\Models\Worker;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RideController extends Controller
{
    public function index(){
        $rides = Ride::with(['driver','user'])->get();
        return view('app.rides.index', compact('rides'));
    }

    public function create()
    {
         $stores = Store::get(); 
         return view('app.rides.create',compact('stores'));

    }

    public function asignWorkers(Request $request){
        $storeId = $request['store'];
        $store = Store::find($storeId);
        $workers = $store->workers->where('on_ride',0);
        $drivers = Driver::get();
        return view('app.rides.add_workers',compact('workers','store','drivers'));
    }


    //Test function

    function getWorkers(Request $request){
        $store = Store::with('workers')->find($request['store']);//Sucursal del request con la relacion colaboradores
        $workers = $store->workers;//Se obtienen los colaboradores asignados a la sucursal
        $workersRequest = $request['workers'];//Se obtienen los colaboradores enviados desde el request


        $totalDistance = 0; //Incializamos la distancia
        foreach($workers as $worker){//Recorremos los colaboradores de la bd
            foreach($workersRequest as $workerReq){//Recorremos los colaboradores del request
                if($worker->id == $workerReq){//Comparamos que sean el mismo id
                    $distance = $worker->pivot->distance;//Calculamos distancia total
                    $totalDistance = $totalDistance + $distance;
     
                    $worker->on_ride = 1;//Actualizar status del conductor
                    $worker->update();
                }
            }
        }
        return [
            'totalDistance' => $totalDistance,
            'workersRequest' => $workersRequest
        ];

    } 
    //Test function


    public function store(Request $request)
    {
            // $store = Store::with('workers')->find($request['store']);
            // $workers = $store->workers;
            // $workersRequest = $request['workers'];

        //Obtener los datos de los trabajadores que han sido seleccionados por el usuario y compararlos con la distancia en bd
        // $totalDistance = 0;
        // foreach($workers as $worker){
        //     foreach($workersRequest as $workerReq){
        //         if($worker->id == $workerReq){
        //             $distance = $worker->pivot->distance; 
        //             $totalDistance = $totalDistance + $distance;
        //         }
        //     }
        // }
        
        $result = $this->getWorkers($request);//Accedemos a la información del request

        $totalDistance = $result['totalDistance'];
        $workersRequest = $result['workersRequest'];

        $ride = new Ride();
        $ride->driver_id = $request['driver'];
        $ride->distance = $totalDistance;
        $ride->user_id = Auth::user()->id;

        $ride->save();
        $ride->workers()->attach($workersRequest);

        // foreach($workers as $worker){
        //     foreach($workersRequest as $workerReq){
        //         if($worker->id == $workerReq){
        //             $worker->on_ride = 1;
        //             $worker->update();
        //         }
        //     }
        // }

        return redirect()->route('show_rides')->with('success','Viaje registrado correctamente');
    }


    public function show()
    {
        //
    }


    public function edit()
    {
        //
    }


    public function update(Request $request)
    {
   
    }


    public function destroy()
    {
       
    }
}
