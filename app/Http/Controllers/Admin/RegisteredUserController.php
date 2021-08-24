<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\User;

class RegisteredUserController extends Controller
{
    public function index(){
        //$users = User::all();
        //$users = User::paginate(2); //this is for laravel pagination
        /*below code to give the index.blade.php for pagination
              <div class="float-right">
                            {{ $users->links() }} 
                         </div>*/
        //return view('admin.users.index')->with('users',$users);
        
        if(Input::get('roles')!=''){
        $users = User::where('role_as',Input::get('roles'))->get();
        return view('admin.users.index')->with('users',$users);
        }
        else{
         $users = User::all(); 
        return view('admin.users.index')->with('users',$users); 
        }
                         
        
    }

    public function edit($id){
        $user_roles = User::find($id);
        return view('admin.users.edit')->with('user_roles',$user_roles);
    }

    public function updaterole(Request $request,$id){
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->role_as = $request->input('roles');
        $user->is_ban = $request->input('isban');
        $user->update();
        return redirect()->back()->with('status','Role is Updated');


    }

    Public function adminrprofile(){
        return view('admin.admin_profile');
    }

   public function adminprofileupdate(Request $request){
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
        
        $destination = 'uploads/admin_profile/'.$user->profile_image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $file = $request->file('profile_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/admin_profile/',$filename);
        $user->profile_image = $filename;
      }
      $user->update();
      return redirect()->back()->with('status','Profile Updated');



   }
}
