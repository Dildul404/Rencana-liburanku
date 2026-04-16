<?php

namespace App\Http\Controllers;

use App\Models\Daily_activity;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Locale;

class HolidayPlanController extends Controller
{
   public function showHolidayPlan (Request $request) {

    // Auth
    $user = Auth::user();
    if (!$user) {
        return redirect("/");
    }

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

    public function checkLocation (Request $request) {
        // Check lokasi
        Location::where('id', $request['id'])->update([
            'checked' => 1
        ]);

        return redirect('/rencana_liburan?judul=' . $request['judul'])->with('judul', $request['judul']);
    }

    public function uncheckLocation (Request $request) {
        // Check lokasi
        Location::where('id', $request['id'])->update([
            'checked' => 0
        ]);

        return redirect('/rencana_liburan?judul=' . $request['judul'])->with('judul', $request['judul']);
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

        return redirect('/rencana_liburan?judul=' . $request['judul'])->with('judul', $request['judul']);
   }

   public function editLocation (Request $request) {

        Location::where('id', $request['edit_id'])->update([
            'location' => $request['edit_location']
        ]);

        return redirect('/rencana_liburan?judul=' . $request['judul'])->with('judul', $request['judul']);
   }

   public function deleteLocation (Request $request) {

    Location::where('id', $request['id'])->delete();

    return redirect('/rencana_liburan?judul=' . $request['judul'])->with('judul', $request['judul']);
   }
}
