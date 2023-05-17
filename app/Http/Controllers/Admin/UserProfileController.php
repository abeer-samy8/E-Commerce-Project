<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Profile\EditRequest;
use App\Models\Customer;
use RealRashid\SweetAlert\Facades\Alert;


class UserProfileController extends Controller
{
    public function edit(){
        $user=auth()->user();
        return view('admin.user.profile')->withUser($user);
    }

    public function update(EditRequest $request)
    {
        $user = auth()->user();
        $filename="";
        $requestData= $request->all();

        if($request->image){
            $filename= $request->image->store('public/user-images');
            $imagename= $request->image->hashName();
            $requestData['image'] = $imagename;
        }
        $user->fill($requestData);
        $user->save();
        $customerDB= Customer::find($request->id);
        if($customerDB){
            $customerDB->update($requestData);
        }
        return redirect()->route("profile.edit")->with('msg','s:Profile Updated successfully!');

    }
}
