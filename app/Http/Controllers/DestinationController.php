<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DestinationController extends Controller
{
    public function showDestination () {
        if(!Auth::user()) {
            return redirect('/login');
        }    

        $destinations = Destination::all();
        view()->share('destinations', $destinations);

        return view('destinasi_liburan');
    }

    public function store (Request $request) {
        Destination::create([
            'user_id' => Auth::id(),
            'judul' => $request['judul'],
            'tanggal' => $request['tanggal'],
            'budget' => $request['budget'],
            'lama_liburan' => $request['lama_liburan'],
            'lama_liburan' => $request['lama_liburan'],
        ]);

        return redirect('/destinasi_liburan')->with('sucsess', 'Berhasil ditambahkan');
    }
}
