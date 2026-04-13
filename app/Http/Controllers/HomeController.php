<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        if(!Auth::user()) {
            return redirect('/login');
        }

        $destination = Destination::all();

        view()->share('destinations', $destination);

        return view('home');
    }
}
