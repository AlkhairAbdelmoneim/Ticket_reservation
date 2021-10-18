<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        $bus = Bus::paginate(4);
        return view ('dashboard.bus.index' ,compact('bus'));
    }

 
    public function create()
    {
        return view ('dashboard.bus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'model_bus' => 'required|max:50',
            'passenger_count' => 'required|numeric',
            'bus_line' => 'required',
        ]);

     $request_data = $request->except(['_token']);

     Bus::create($request_data);
   
           session()->flash('success',__('site.created_successfully'));
   
           return redirect()->route('bus.index');  
    }


    public function show(Bus $bus)
    {
        //
    }


    public function edit( $id)
    {
        $bus = Bus::find($id);

        if (!$bus) {
            
            session()->flash('error',__('Not found (:'));

            return redirect()->route('bus.index');  
        }
        return view('dashboard.bus.edit' ,compact('bus'));
    }


    public function update(Request $request,  $id)
    {
        $bus = Bus::find($id);

        $request->validate([
            'model_bus' => 'required|max:50',
            'passenger_count' => 'required|numeric',
            'bus_line' => 'required',
        ]);

     $request_data = $request->except(['_token']);

     $bus->update($request_data);
   
           session()->flash('success',__('site.updated_successfully'));
   
           return redirect()->route('bus.index'); 
    }


    public function destroy( $id)
    {
        Bus::find($id)->delete();

        session()->flash('success',__('site.deleted_successfully'));

        return redirect()->route('bus.index');
    }
}
