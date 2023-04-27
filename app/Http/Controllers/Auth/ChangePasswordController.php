<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePassword\EditRequest;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function edit(){
        return view('auth.change-password');
    }

    public function update(EditRequest $request){
        if(Hash::check($request->password,auth()->user()->password)){
            if($request->password == $request->new_password){
                Alert::warning('The new password must be different from the current password', 'Warning Message');

                return redirect(route('password.edit'));
            }
            $user = auth()->user();
            $user->password = bcrypt($request->new_password);
            $user->save();
            Alert::success('Password changed successfully', 'Success Message');

        }else{
            Alert::error('Your current password is not correct.. Please try again', 'Error Message');

        }
        return redirect(route('password.edit'));
    }
}
