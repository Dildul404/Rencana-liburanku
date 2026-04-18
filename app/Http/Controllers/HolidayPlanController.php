<?php

namespace App\Http\Controllers;

use App\Models\Daily_activity;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Locale;

class HolidayPlanController extends Controller
{
    public function showHolidayPlan(Request $request)
    {

        // Auth
        $user = Auth::user();
        if (!$user) {
            return redirect("/");
        }

        return view('Rencana_liburan')->with(['judul' => $request->judul, 'id' => $request->id, 'user' => $user]);
    }

    public function storeLocation(Request $request)
    {
        // Buat lokasi    
        Location::create([
            'destination_id' => $request['destination_id'],
            'location' => $request['location'],
        ]);

        // Tampilkan lokasi
        return redirect('/rencana_liburan?judul=' . $request->judul . '&id=' . $request->destination_id);
    }

    public function checkLocation(Request $request)
    {
        // Check lokasi
        Location::where('id', $request['id'])->update([
            'checked' => 1
        ]);

        return redirect('/rencana_liburan?judul=' . $request['judul'] . '&id=' . $request->destination_id)->with('judul', $request['judul']);
    }

    public function checkActivity(Request $request)
    {
        // Check lokasi
        Daily_activity::where('id', $request['id'])->update([
            'checked' => 1
        ]);

        return redirect('/rencana_liburan?judul=' . $request['judul'] . '&id=' . $request->destination_id)->with('judul', $request['judul']);
    }

    public function uncheckLocation(Request $request)
    {
        // Check lokasi
        Location::where('id', $request['id'])->update([
            'checked' => 0
        ]);

        return redirect('/rencana_liburan?judul=' . $request['judul'] . '&id=' . $request->destination_id)->with('judul', $request['judul']);
    }

    public function uncheckActivity(Request $request)
    {
        // Check lokasi
        Daily_activity::where('id', $request['id'])->update([
            'checked' => 0
        ]);

        return redirect('/rencana_liburan?judul=' . $request['judul'] . '&id=' . $request->destination_id)->with('judul', $request['judul']);
    }

    public function storeActivities(Request $request)
    {

        // Buat atifitas
        Daily_activity::create([
            'destination_id' => $request['destination_id'],
            'activities' => $request['activity'],
            'schedule' => $request['schedule'],
            'time' => $request['time'],
            'tanggal' => $request['tanggal'],
            'lama_liburan' => $request['lama_liburan'],
        ]);

        return redirect('/rencana_liburan?judul=' . $request['judul'] . '&id=' . $request->destination_id)->with('judul', $request['judul']);
    }

    public function editLocation(Request $request)
    {

        Location::where('id', $request['edit_id'])->update([
            'location' => $request['edit_location']
        ]);

        return redirect('/rencana_liburan?judul=' . $request['judul'] . '&id=' . $request->id)->with('judul', $request['judul']);
    }

    public function deleteLocation(Request $request)
    {

        Location::where('id', $request['id'])->delete();

        return redirect('/rencana_liburan?judul=' . $request['judul'] . '&id=' . $request->destination_id)->with('judul', $request['judul']);
    }

    public function deleteActivity(Request $request)
    {

        Daily_activity::where('id', $request['id'])->delete();

        return redirect('/rencana_liburan?judul=' . $request['judul'] . '&id=' . $request->destination_id)->with('judul', $request['judul']);
    }

    public function editActivity (Request $request) {

        Daily_activity::where('id',(int) $request['edit_activity_id'])->update([
            'activities' => $request['edit_activity'],
            'schedule' => $request['edit_schedule'],
            'time' => $request['edit_time'],
        ]);

        return redirect('/rencana_liburan?judul=' . $request['judul'] . '&id=' . $request->destination_id)->with('judul', $request['judul']);
    }
}
