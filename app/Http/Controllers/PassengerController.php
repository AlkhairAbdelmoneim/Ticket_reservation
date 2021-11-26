<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Illuminate\Http\Request;

// كود إضافة وتعديل وحذف بيانات المسافر
class PassengerController extends Controller
{

    // داله عرض كل المسافرين
    public function index()
    {
        $passenger = Passenger::with('modelBus')->paginate(4);
        return view ('dashboard.passenger.index' ,compact('passenger'));
    }

    // دال إضافة مسافر جديد 
    public function create()
    {
        return view ('dashboard.passenger.create');
    }


        // داله حفظ بيانات البص المدخله بواسطه شاشة إضافه مسافر
    // يتم حفظ البانات المدخله داخل الداتا بيز في جدول المسافرين
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'phone' => 'required',
            'chair_count' => 'required|numeric',
        ]);

     $request_data = $request->except(['_token']);

     Passenger::create($request_data);
   
           session()->flash('success',__('site.created_successfully'));
   
           return redirect()->route('passenger.index');  
    }


    // public function show(Passenger $id)
    // {

    // }

    // دالة عرض شاشة تعديل بيانات المسافر المختاره من شاشة عرض كل المسافرين
    public function edit( $id)
    {
        $passenger = Passenger::find($id);

        if (!$passenger) {
            
            session()->flash('error',__('Not found (:'));

            return redirect()->route('passenger.index');  
        }
        return view('dashboard.passenger.edit' ,compact('passenger'));
    }

 
       // دالة حفظ البانات التي تم التعديل عليها من شاشة تعديل البيانات 
    //وحفظها في جدول المسافرين داخل الداتا بيز
    public function update(Request $request,  $id)
    {
        $passenger = Passenger::find($id);
        $request->validate([
            'name' => 'required|max:50',
            'phone' => 'required',
            'chair_count' => 'required|numeric',
        ]);

     $request_data = $request->except(['_token']);

     
     $passenger->update($request_data);
   
           session()->flash('success',__('site.updated_successfully'));
   
           return redirect()->route('passenger.index');  
    }


      // دالة حذف بيانات المسافر المختاره من شاشة عرض كل المسافرين
    public function destroy( $id)
    {
        Passenger::find($id)->delete();

        session()->flash('success',__('site.deleted_successfully'));

        return redirect()->route('passenger.index');
    }
}
