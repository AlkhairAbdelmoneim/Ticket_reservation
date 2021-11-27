<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

// كود تعديل معلومات مدير النظام
class ChangeUserController extends Controller
{
    public function change(Request $request)
    {

        $this->validate($request, [ 
            'new_password' => 'required|min:8',
            'old_password' => 'required',
        ]);
 
        $hashedPassword = Auth::user()->password;
        $email = Auth::user()->email;

        if ($request->email) {
            $users = User::find(Auth::user()->id);

            $users->update([
                'email' => $request->email,
            ]);
        }

        if (\Hash::check($request->old_password , $hashedPassword)) {
            if (\Hash::check($request->old_password , $hashedPassword)) {
 
                $users = User::find(Auth::user()->id);
                $users->password = bcrypt($request->new_password);
                $users->save();

                $noty = getMessage('تم تغيير كلمة المرور بنجاح' ,'success');
                return redirect()->route('home')->with($noty);
            }
            else{

                $noty = getMessage('لا يمكن أن تكون كلمة المرور الجديدة هي كلمة المرور القديمة!' ,'warning');
                return redirect()->route('home')->with($noty);
            } 
        }
        else{

            $noty = getMessage('كلمة المرور القديمة غير متطابقة' ,'warning');
            return redirect()->route('home')->with($noty);
        }
    }

}
