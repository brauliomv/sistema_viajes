<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reports\ReportRequest;
use App\Models\Driver;
use App\Models\Ride;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\Snappy\Facades\SnappyPdf;
//use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $drivers = Driver::get();
        return view('app.reports.index',compact('drivers'));
    }

    public function generate(ReportRequest $request){
        $driverId = $request['driver'];
        $startDate = $request['start-date'];
        $endDate = $request['end-date'];
        $totalDistance = 0;
        $payment = 0;

        $driver = Driver::where('id',$driverId)->first();

        $rides = Ride::with(['workers'])
                    ->where('driver_id',$driverId)
                    ->wherebetween('created_at',[$startDate,$endDate])
                    ->get();
                    
        if($rides->count() >= 1){
            foreach($rides as $ride){
                $totalDistance = $totalDistance + $ride->distance;
             }
            $payment = $totalDistance * $driver->fee;
           // return view('app.reports.ride_report',compact(['rides','driver', 'totalDistance','payment']));
            $pdf = Pdf::loadView('app.reports.ride_report',compact(['rides','driver', 'totalDistance','payment']));
            //$pdf = SnappyPdf::loadView('app.reports.ride_report',compact(['rides','driver', 'totalDistance','payment']));
            //$pdf->setOption('no-print-media-type', true);
            return $pdf->stream('reporte_'.$driver->name.'.pdf');
            
        }else{
            return redirect()->back()->with('error','No se han encontrado registros para las fechas establecidas');
        }
        
    }
}
