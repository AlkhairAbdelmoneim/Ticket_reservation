<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

// كود إضافة وتعديل وحذف بصات الرحلات
class BusController extends Controller
{
    // داله عرض كل البصات السفريه
    public function index()
    {
        $bus = Bus::paginate(4);
        return view ('dashboard.bus.index' ,compact('bus'));
    }

 
    // دال إضافة بصات سفريه
    public function create()
    {
        return view ('dashboard.bus.create');
    }

    // داله حفظ بيانات البص المدخله بواسطه شاشة إضافه بصات
    // يتم حفظ البانات المدخله داخل الداتا بيز في جدول البصات
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


    // public function show(Bus $bus)
    // {
    //     //
    // }

    // دالة عرض شاشة تعديل بيانات البص المختاره من شاشة عرض كل البصات
    public function edit( $id)
    {
        $bus = Bus::find($id);

        if (!$bus) {
            
            session()->flash('error',__('Not found (:'));

            return redirect()->route('bus.index');  
        }
        return view('dashboard.bus.edit' ,compact('bus'));
    }


    // دالة حفظ البانات التي تم التعديل عليها من شاشة تعديل البيانات 
    //وحفظها في جدول البصات داخل الداتا بيز
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


    // دالة حذف بيانات البص المختاره من شاشة عرض كل البصات
    public function destroy( $id)
    {
        Bus::find($id)->delete();

        session()->flash('success',__('site.deleted_successfully'));

        return redirect()->route('bus.index');
    }
}
