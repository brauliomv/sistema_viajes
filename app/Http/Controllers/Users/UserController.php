<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Http\Requests\Users\UserRequest;
use App\Models\User;
use App\Models\Role;
use Faker\Provider\UserAgent;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();        
        return view('app.users.index',compact('users'));
    }


    public function create()
    {
        $roles = Role::get();
        return view('app.users.create',compact('roles'));
    }


    public function store(UserRequest $request)
    {
       //return $request;
          $user = new User();
          $user -> name = $request['name'];
          $user -> email = $request['email'];
          $user -> password = bcrypt($request['password']);
          $user -> role_id = $request['role_id'];

          $user -> save();
            
         // $user = User::create($request->all());
          return redirect()->route('show_users',$user)->with('success','Nuevo usuario registrado');
    }


    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
        //return $driver;
        $roles = Role::get();
        return view('app.users.edit',compact('user','roles'));
    }


    public function update(UpdateUserRequest $request, User $user )
    {
    //    $driver->name = $request['driver_name'];
    //    $driver->dni = $request['driver_dni'];

      
       $user->update($request->all());
       return redirect()->route('show_users')->with('info','Datos actualizados correctamente');
    }


    public function destroy(User $user)
    {
        //return $user->email;
        if($user->email == "admin@sys.com"){
            return redirect()->back()->with('error','Ha ocurrido un error'); 
        }

        $user->delete();
         return redirect('users');
    }
}
