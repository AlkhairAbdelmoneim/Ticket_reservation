<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

// كود الاقسام 
// هنا تتم عمليه انشاء او تعديل او عرض الاقسام 
class DepartmentController extends Controller
{

    // داله عرض كل الاقسام
    public function index()
    {
        $department = Department::all();
        return view('dashboard.department.index' ,compact('department'));
    }


    // داله عرض شاشة انشاء قسم عند الظغط علي زر الاضافة
    public function create()
    {

        return view('dashboard.department.create');
    }

    // داله تخزين بيانات القسم المدخله من شاشة انشاء الاقسام
    // يتم تخزين البيانات في الداتا بيز في جدول الاسام
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:35',
        ]);

     $request_data = $request->except(['_token']);

     Department::create($request_data);

     $noty = getMessage(__('site.created_successfully') ,'success');
     return redirect()->route('department.index')->with($noty);
    }


    // public function show(Department $department)
    // {
    //     //
    // }

    // دالة عرض شاشة تعديل القسم المختار من شاشة عرض الاقسام
    public function edit( $id)
    {
        $department = Department::find($id);

        if (!$department) {
            
            session()->flash('error',__('Not found (:'));

            return redirect()->route('passenger.index');  
        }
        return view('dashboard.department.edit' ,compact('department'));
    }

  
    // دالة تعديل البيانات المدخله من شاشة تعديل الاقسام 
    // بعد التعديل يتم تخزينها في جدول الاقسام 
    public function update(Request $request, $id)
    {
         $department = Department::find($id);

        $request->validate([
            'name' => 'required|max:35',
        ]);

     $request_data = $request->except(['_token']);

     $department->update($request_data);

           $noty = getMessage(__('site.updated_successfully') ,'success');
           return redirect()->route('department.index')->with($noty);
    }


    // دالة حذف القسم المختار من شاشة عرض الاقسام
    public function destroy( $id)
    {
        Department::find($id)->delete();

        $noty = getMessage(__('site.deleted_successfully') ,'success');
        return redirect()->route('department.index')->with($noty);
    }
}
