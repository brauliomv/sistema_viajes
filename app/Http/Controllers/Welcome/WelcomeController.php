<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Ride;
use App\Models\Store;
use App\Models\Worker;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){

        $stores = Store::get()->count();
        $drivers = Driver::get()->count();
        $workers = Worker::get()->count();
        $rides = Ride::get()->count();
        return view('app/index',compact('stores','drivers','workers','rides'));
    }
}
