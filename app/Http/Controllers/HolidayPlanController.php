<?php

namespace App\Http\Controllers;

use App\Models\Daily_activity;
use App\Models\Location;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Locale;

class HolidayPlanController extends Controller
{
   public function showHolidayPlan (Request $request) {
    return view('Rencana_liburan')->with('judul',$request->judul);
   } 

   public function storeLocation (Request $request) {

    // Buat lokasi    
    Location::create([
        'destination_id' => $request['destination_id'],
        'location' => $request['location'],
    ]);

    // Tampilkan lokasi
    return redirect('/rencana_liburan?judul=' . $request->judul);

   }

   public function storeActivities (Request $request) {

    // Buat atifitas
    Daily_activity::create([
        'destination_id' => $request['destination_id'],
        'activities' => $request['activity'],
        'schedule' => $request['schedule'],
        'tanggal' => $request['tanggal'],
        'lama_liburan' => $request['lama_liburan'],
    ]);

    return redirect('/Rencana_liburan?judul=' . $request->judul);
   }
}
