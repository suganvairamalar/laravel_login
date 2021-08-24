<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        return view('user_home');
    }

   Public function userprofile(){
        return view('frontend.user.user_profile');
    }

   public function userprofileupdate(Request $request){
      $user_id = Auth::user()->id;
      $user = User::findorfail($user_id);
      $user->lname = $request->input('lname');
      $user->address1 = $request->input('address1');
      $user->address2 = $request->input('address2');
      $user->city = $request->input('city');
      $user->state = $request->input('state');
      $user->pincode = $request->input('pincode');
      $user->phone = $request->input('phone');
      $user->alternate_phone = $request->input('alternate_phone');
      
      if($request->hasfile('profile_image')){
        
        $destination = 'uploads/user_profile/'.$user->profile_image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $file = $request->file('profile_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/user_profile/',$filename);
        $user->profile_image = $filename;
      }
      $user->update();
      return redirect()->back()->with('status','Profile Updated');



   }
}
