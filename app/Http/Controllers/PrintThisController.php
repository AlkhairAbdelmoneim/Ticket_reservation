<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Petition;

// كود طباعة العريضه المختاره من شاشة العرائض
class PrintThisController extends Controller
{
    public function printThis($id)
    {
        $petition = Petition::with('Department')->find($id);

        return view('dashboard.printThis' ,compact('petition'));
    }
}
