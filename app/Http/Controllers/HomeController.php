<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        // Auth
        $user = Auth::user();

        if ($user) {

            // Spot & aktifitas
            $spot_aktifitas = 0;
            foreach (Auth::user()->destinations as $destination) {
                $locations = count($destination->locations);
                $activities = count($destination->Daily_activities);

                $spot_aktifitas += $locations + $activities;
            }

            // Destinasi tercapai
            $tercapai = 0;
            foreach (Auth::user()->destinations as $destination) {
                if ($destination->status == true) {
                    $tercapai++; 
                }
            }

            view()->share([
                'user' => $user,
                'spot_aktifitas' => $spot_aktifitas,
                'tercapai' => $tercapai
            ]);
        } else {
            return redirect('/');
        }

        return view('home');
    }
}
