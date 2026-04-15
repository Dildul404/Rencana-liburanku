<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DestinationController extends Controller
{
    public function showDestination () {
        return view('destinasi_liburan');
    }

    public function store (Request $request) {
        
        // Buat destinasi
        $lama_liburan = $request['lama_liburan'] . ' ' .  $request['hari/bulan']; 
        Destination::create([
            'user_id' =>Auth::id(),
            'judul' => $request['judul'],
            'tanggal' => $request['tanggal'],
            'budget' => $request['budget'],
            'lama_liburan' => $lama_liburan,
        ]);

        //jika ada judul duplikat

        return redirect('/destinasi_liburan')->with('sucsess', 'Berhasil ditambahkan');
    }
}
