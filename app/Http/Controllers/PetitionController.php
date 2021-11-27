<?php

namespace App\Http\Controllers;

use App\Models\Petition;
use App\Models\Employee;

use Illuminate\Http\Request;

// كود العرائض 
// هنا تتم عمليه انشاء او تعديل او عرض العرائض 
class PetitionController extends Controller
{

    public function index()
    {
        $petition = Petition::with('Department')->get();
        return view('dashboard.petition.index' ,compact('petition'));
    }

 
    // داله عرض كل العرائض
    public function create()
    {
        $employee = Employee::all();
        return view('dashboard.petition.create' ,compact('employee'));
    }


    // داله تخزين بيانات القسم المدخله من شاشة انشاء العريضه
    // يتم تخزين البيانات في الداتا بيز في جدول العريضه
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:35',
            'lawyer_name' => 'required|max:50',
            'lawyer_phone' => 'required',
            'petition_name' => 'required',
            'subject_appeal' => 'required',
            'type_petition' => 'required',
            'type_judgment' => 'required',
            // 'em_research' => 'required',
            'payment' => 'required',
        ]);

     $request_data = $request->except(['_token']);

     Petition::create($request_data);

     $noty = getMessage("تم الإضافه بنجاح" ,'success');
     return redirect()->route('petition.index')->with($noty);
    }


    // public function show(Petition $petition)
    // {
    //     //
    // }

    // دالة عرض شاشة تعديل القسم المختار من شاشة عرض العريضه
    public function edit( $id)
    {
        $employee = Employee::all();
        $petition = Petition::find($id);

        if (!$petition) {
            
            session()->flash('error',__('Not found (:'));

            return redirect()->route('petition.index');  
        }
        return view('dashboard.petition.edit' ,compact('petition','employee'));
    }


        // دالة تعديل البيانات المدخله من شاشة تعديل العريضه 
    // بعد التعديل يتم تخزينها في جدول العريضه 
    public function update(Request $request,  $id)
    {
        $petition = Petition::find($id);
        $request->validate([
            'name' => 'required|max:35',
            'lawyer_name' => 'required|max:50',
            'lawyer_phone' => 'required',
            'petition_name' => 'required',
            'subject_appeal' => 'required',
            'type_petition' => 'required',
            'type_judgment' => 'required',
            // 'em_research' => 'required',
            'payment' => 'required',
        ]);

     $request_data = $request->except(['_token']);

     $petition->update($request_data);

     $noty = getMessage("تم التعديل بنجاح" ,'success');
     return redirect()->route('petition.index')->with($noty);
    }


        // دالة حذف القسم المختار من شاشة عرض العريضه
    public function destroy( $id)
    {
        $petition = Petition::find($id)->delete();


        $noty = getMessage("تم الحذف بنجاح" ,'success');
        return redirect()->route('petition.index')->with($noty);
    }
}
