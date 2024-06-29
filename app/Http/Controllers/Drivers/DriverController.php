<?php

namespace App\Http\Controllers\Drivers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Drivers\DriverRequest;
use App\Http\Requests\Drivers\UpdateDriverRequest;
use App\Models\Driver;
use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;

class DriverController extends Controller
{

    public function index()
    {
        $drivers = Driver::get();        
        return view('app.drivers.index',compact('drivers'));
    }


    public function create()
    {
        return view('app.drivers.create');
    }


    public function store( DriverRequest $request)
    {
       // return $request;
    //    $driver = new Driver();
    //    $driver -> name = $request['driver_name'];
    //    $driver -> dni = $request['driver_dni'];

       $driver = Driver::create($request->all());
       return redirect()->route('show_drivers',$driver)->with('success','Nuevo conductor registrado');
    }


    public function show($id)
    {
        //
    }


    public function edit(Driver $driver)
    {
        //return $driver;
        return view('app.drivers.edit',compact('driver'));
    }


    public function update(UpdateDriverRequest $request, Driver $driver )
    {
    //    $driver->name = $request['driver_name'];
    //    $driver->dni = $request['driver_dni'];

       $driver->update($request->all());
       return redirect()->route('show_drivers')->with('info','Datos actualizados correctamente');
    }


    public function destroy(Driver $driver)
    {
         $driver->delete();
         return redirect('drivers');
    }
}
