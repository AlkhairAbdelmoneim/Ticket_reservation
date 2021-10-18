<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travels;
use App\Models\Bus;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $travels = Travels::all();
        $bus = Bus::all();
        return view('dashboard.welcome' ,compact('travels','bus'));
    }
}
