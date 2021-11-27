<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

// كود الموظفين 
// هنا تتم عمليه انشاء او تعديل او عرض الموظفين 

class EmployeeController extends Controller
{

// داله عرض كل الاقسام
    public function index()
    {
        $employee = Employee::with('Department')->get();
        return view('dashboard.employee.index' ,compact('employee'));
    }


    // داله عرض شاشة انشاء الموظفين عند الظغط علي زر الاضافة
    public function create()
    {
        $department = Department::all();
        return view('dashboard.employee.create' ,compact('department'));
    }


     // داله تخزين بيانات الموظفين المدخله من شاشة انشاء الموظفين
    // يتم تخزين البيانات في الداتا بيز في جدول الموظفين
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:35',
            'phone' => 'required',
            'address' => 'required',
            'department' => 'required',
            'gender' => 'required',
        ]);

     $request_data = $request->except(['_token']);

     Employee::create($request_data);

     $noty = getMessage("تم الإضافه بنجاح" ,'success');
     return redirect()->route('employee.index')->with($noty);

    }


    // public function show(Employee $employee)
    // {
    //     //
    // }

  // دالة عرض شاشة تعديل القسم المختار من شاشة عرض الموظفين
    public function edit( $id)
    {
        $employee = Employee::find($id);
        $department = Department::all();

        if (!$employee) {
            
            session()->flash('error',__('Not found (:'));

            return redirect()->route('passenger.index');  
        }
        return view('dashboard.employee.edit' ,compact('employee','department'));
    }


    // دالة تعديل البيانات المدخله من شاشة تعديل الموظفين 
    // بعد التعديل يتم تخزينها في جدول الموظفين 
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        $request->validate([
            'name' => 'required|max:35',
            'phone' => 'required',
            'address' => 'required',
            'department' => 'required',
            'gender' => 'required',
        ]);

     $request_data = $request->except(['_token']);

     $employee->update($request_data);

           $noty = getMessage(__('site.updated_successfully') ,'success');
           return redirect()->route('employee.index')->with($noty);
   
    }


        // دالة حذف القسم المختار من شاشة عرض الموظفين
    public function destroy(Employee $id)
    {
        Employee::find($id)->delete();

        $noty = getMessage("تم الحذف بنجاح" ,'success');
        return redirect()->route('employee.index')->with($noty);

    }
}
