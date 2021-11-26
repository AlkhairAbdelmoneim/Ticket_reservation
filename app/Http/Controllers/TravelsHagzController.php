<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Passenger;
use App\Models\Travels;
use Illuminate\Http\Request;

// كود إضافة وتعديل وحذف بيانات الرحلات المحجوزه
class TravelsHagzController extends Controller
{
    public function index()
    {
        // داله عرض كل البصات
        $bus = Bus::all();
        return view ('dashboard.bus.index' ,compact('bus'));
    }

 
    public function create()
    {
        return view ('dashboard.bus.create');
    }

    public function store(Request $request)
    {
        
        $request_data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'chair_count' => 'required',
            'travel_from_to' => 'required',
        ]);

        $request_data = $request->except(['_token']);

        $travels = Travels::with('modelBus')->find($request_data['travel_from_to']);

         if ($travels['tickets_no'] < $request_data['chair_count'] || $travels['tickets_no']  == 0) {
             
            session()->flash('error','لا يوجد مقاعد كافيه لهذه الرحله عدد المقاعد المتوفره '.$travels['tickets_no']);
   
            return redirect()->route('home'); 
         }

         $travels_tickets_no = $travels['tickets_no'] - $request_data['chair_count'] ; // tickets_no - chair_count of passenger 

         $travels->update([
            'tickets_no' => $travels_tickets_no,
         ]);


        $travel_price = $travels['price'] * $request_data['chair_count']; // count of price

        $passenger = Passenger::create([
        'name' => $request_data['name'],
        'phone' => $request_data['phone'],
        'chair_count' => $request_data['chair_count'],
        'model_bus' => $travels['model_bus'],
        'price' => $travel_price,
        ]);

        // return $travels;
   
           session()->flash('success','تم حجز الرحله بنجاح');
            
           return view ('dashboard.travelHagz.index' ,compact('passenger','travels'));
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
            'name' => 'required',
            'phone' => 'required',
            'model_bus' => 'required',
            'chair_count' => 'required|numeric',
            'travel_from_to' => 'required',
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
