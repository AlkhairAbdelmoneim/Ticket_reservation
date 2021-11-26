<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class ChangeController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.change.index');
    }

    public function update(Request $request)
    {
        // return $request;

        $this->validate($request, [ 
            'new_password' => 'required|min:8',
            'old_password' => 'required',
            'name' => 'required|max:50',
            'email' => 'required|email',
        ]);
 
        $hashedPassword = Auth::user()->password;
        $email = Auth::user()->email;

        if ($request->email) {
            
            $users = User::find(Auth::user()->id);
            $users->update([
                'email' => $request->email,
            ]);
        }

        if ($request->name) {
            
            $users = User::find(Auth::user()->id);
            $users->update([
                'name' => $request->name,

            ]);

        }

        if (\Hash::check($request->old_password , $hashedPassword)) {
            if (\Hash::check($request->old_password , $hashedPassword)) {
 
                $users = User::find(Auth::user()->id);
                $users->password = bcrypt($request->new_password);
                $users->save();

                session()->flash('success','تم تغيير كلمة المرور بنجاح');
   
                return redirect()->route('change'); 
            }
            else{

                session()->flash('success','لا يمكن أن تكون كلمة المرور الجديدة هي كلمة المرور القديمة!');
   
                return redirect()->route('change'); 
            } 
        }
        else{

            session()->flash('error', 'كلمة المرور القديمة غير متطابقة');
   
            return redirect()->route('change'); 
        }
    }
}
