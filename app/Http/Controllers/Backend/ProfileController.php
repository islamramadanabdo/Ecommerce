<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use File;

class ProfileController extends Controller
{
    public function index(){
        return view('admin.profile.index');
    }

    public function update(Request $request , $id){
        $validated = $request->validate([
            'name'   => ['required' , 'string' , 'min:3' , 'max:100'],
            'email'  => ['required' ,'string' ,'email' , 'unique:users,email,'. Auth::user()->id],
            'image'  => ['image' , 'max:2048'],
        ]);


        $user = User::findOrFail($id);

        if($request->hasFile('image')){

            if(File::exists(public_path($user->image))){
                File::delete(public_path($user->image));
            }

            $image = $request->image;
            $imageName = rand().'_'.$image->getClientOriginalName();

            $image->move(public_path('uploads') , $imageName);
            $path = "/uploads/".$imageName;
            $user->image = $path;
        }

        $user->update($validated);

        toastr()->success('Profile Updated Successfully');

        return redirect()->route('admin.profile');
    }


    public function updatePassword(Request $request , $id){
        $validated = $request->validate([
            'current_password'   => ['required' , 'string' , 'current_password'],
            'password'  => ['required' ,'confirmed' , 'min:8'],
        ]);


        $request->user()->update([
            'password' => bcrypt($request->password),
        ]);

        toastr()->success('Passowrd Updated Successfully');

        return redirect()->route('admin.profile');
    }
}
