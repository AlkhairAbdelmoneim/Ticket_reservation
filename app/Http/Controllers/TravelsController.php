<?php

namespace App\Http\Controllers;

use App\Models\Travels;
use App\Models\Bus;
use Illuminate\Http\Request;

class TravelsController extends Controller
{

    public function index(Request $request)
    {

        $travels = Travels::with('modelBus')->when($request->search , function($query) use($request){

            return $query->where('travel_name' , 'like' , '%' .$request->search . '%');

        })->latest()->paginate(PAGINATION_COUNT);  
        
        $bus = Bus::all();
        // $travels = Travels::with('modelBus')->paginate(4);
        return view ('dashboard.travels.index' ,compact('travels' ,'bus'));
    }


    public function create()
    {
        $bus = Bus::all();
        return view ('dashboard.travels.create',compact('bus'));
    }


    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'travel_name' => 'required|max:50',
            'travel_from' => 'required',
            'travel_to' => 'required',
            'travel_date' => 'required',
            'travel_go' => 'required',
            'travel_arive' => 'required',
            'price' => 'required',
            'model_bus' => 'required',
            'tickets_no' => 'required|numeric',
        ]);

     $request_data = $request->except(['_token']);

     Travels::create($request_data);
   
           session()->flash('success',__('site.created_successfully'));
   
           return redirect()->route('travels.index');  
    }

    public function show(Travels $travels)
    {
        //
    }

  
    public function edit( $id)
    {
        $bus = Bus::all();
        $travel = Travels::find($id);

        if (!$travel) {
            
            session()->flash('error',__('Not found (:'));

            return redirect()->route('travels.index');  
        }
        return view('dashboard.travels.edit' ,compact('travel','bus'));
    }

    public function update(Request $request,  $id)
    {
        $travel = Travels::find($id);
        $request->validate([
            'travel_name' => 'required|max:50',
            'travel_from' => 'required',
            'travel_to' => 'required',
            'travel_date' => 'required',
            'travel_go' => 'required',
            'travel_arive' => 'required',
            'price' => 'required',
            'model_bus' => 'required',
            'tickets_no' => 'required|numeric',
        ]);

     $request_data = $request->except(['_token']);

     $travel->update($request_data);
   
           session()->flash('success',__('site.updated_successfully'));
   
           return redirect()->route('travels.index');  
    }


    public function destroy( $id)
    {
        Travels::find($id)->delete();

        session()->flash('success',__('site.deleted_successfully'));

        return redirect()->route('travels.index');
    }
}
