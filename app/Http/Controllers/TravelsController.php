<?php

namespace App\Http\Controllers;

use App\Models\Travels;
use App\Models\Bus;
use Illuminate\Http\Request;

// كود إضافة وتعديل وحذف بيانات المسافر
class TravelsController extends Controller
{

    // داله عرض كل الرحلات
    public function index(Request $request)
    {

        $travels = Travels::with('modelBus')->when($request->search , function($query) use($request){

            return $query->where('travel_name' , 'like' , '%' .$request->search . '%');

        })->latest()->paginate(PAGINATION_COUNT);  
        
        $bus = Bus::all();
        // $travels = Travels::with('modelBus')->paginate(4);
        return view ('dashboard.travels.index' ,compact('travels' ,'bus'));
    }


    // دال إضافة رحله جديد 
    public function create()
    {
        $bus = Bus::all();
        return view ('dashboard.travels.create',compact('bus'));
    }

    // داله حفظ بيانات البص المدخله بواسطه شاشة إضافه رحله
    // يتم حفظ البيانات المدخله داخل الداتا بيز في جدول الرحلات
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

  
    // دالة عرض شاشة تعديل بيانات الرحلات المختاره من شاشة عرض كل الرحلات
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

    // دالة حفظ البانات التي تم التعديل عليها من شاشة تعديل البيانات 
    //وحفظها في جدول الرحلات داخل الداتا بيز
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


    // دالة حذف بيانات الرحلات المختاره من شاشة عرض كل الرحلات
    public function destroy( $id)
    {
        Travels::find($id)->delete();

        session()->flash('success',__('site.deleted_successfully'));

        return redirect()->route('travels.index');
    }
}
