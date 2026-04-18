<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\error;

class DestinationController extends Controller
{
    public function showDestination () {
        
        // Auth
        $user = Auth::user();
        if ($user) {
            view()->share([
                'user' => $user
            ]);
        } else {
            return redirect('/');
        }

        return view('destinasi_liburan');
    }

    public function store (Request $request) {

        // validasi gambar
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $path = $request->file('image')->store('images', 'public');
            
            // Buat destinasi
            Destination::create([
                'user_id' =>Auth::id(),
                'judul' => $request['judul'],
                'tanggal' => $request['tanggal'],
                'budget' => $request['budget'],
                'lama_liburan' => $request['lama_liburan'],
                'image' => $path,
            ]);
        } catch (Error) {
            return ;
        }

        return redirect('/destinasi_liburan')->with('sucsess', 'Berhasil ditambahkan');
    }

    public function edit (Request $request) {

        // validasi
        try {
            $request->validate([
                'edit_image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $path = $request->file('edit_image')->store('images', 'public');
            
            // Update/Edit destinasi
            Destination::where('id', $request['edit_id'])->update([
                'user_id' =>Auth::id(),
                'judul' => $request['edit_judul'],
                'tanggal' => $request['edit_tanggal'],
                'budget' => $request['edit_budget'],
                'lama_liburan' => $request['edit_lama_liburan'],
                'image' => $path,
            ]);
        } catch (Error) {
            return ;
        }

        return redirect('/destinasi_liburan')->with('sucsess', 'Berhasil diedit');
    }

    public function delete (Request $request) {
        
        try {
            Destination::where('id', $request['id'])->delete();
        } catch (Error) {
            return ;
        }

        return redirect('/destinasi_liburan')->with('sucsess', 'Berhasil dihapus');
    }

    public function statusTrue (Request $request) {
        Destination::where('id', $request->id)->update([
            'status' => 1
        ]);

        return redirect('/rencana_liburan?judul=' . $request['judul'] . '&id=' . $request->id)->with('judul', $request['judul']);
    }

    public function statusFalse (Request $request) {
        Destination::where('id', $request->id)->update([
            'status' => 0
        ]);

        return redirect('/rencana_liburan?judul=' . $request['judul'] . '&id=' . $request->id)->with('judul', $request['judul']);
    }
}
