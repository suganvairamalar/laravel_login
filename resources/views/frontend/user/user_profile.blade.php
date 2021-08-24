@extends('layouts.user')
@section('content')
@section('title')
My Profile
@endsection
@section('content')
<section style="padding-top: 104px;">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                   @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <div class="row">
                        <div class="col-md-6">
                           <h4>My Profile Page</h4>
                        </div>
                        <div class="col-md-6" align="right">
                           <a class="btn btn-info btn-sm" href="{{url('user-home')}}">Back</a>
                        </div>
                  </div>
 <hr>
                 
             
            
                  <form action="{{url('user-profile-update')}}" method="POST" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="">First Name</label>
                              <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="">Last Name</label>
                              <input type="text" name="lname" class="form-control" value="{{ Auth::user()->lname }}">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="">Email</label>
                              <input type="text" readonly name="email" class="form-control" value="{{ Auth::user()->email }}">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Address 1 (FlatNo, Apt No & Address)</label>
                              <input type="text" name="address1" class="form-control" value="{{ Auth::user()->address1 }}">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Address 2 (Landmark, near by)</label>
                              <input type="text" name="address2" class="form-control" value="{{ Auth::user()->address2 }}">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="">City</label>
                              <input type="text" name="city" class="form-control" value="{{ Auth::user()->city }}">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="">State</label>
                              <input type="text" name="state" class="form-control" value="{{ Auth::user()->state }}">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="">Pincode/Zipcode</label>
                              <input type="text" name="pincode" class="form-control" value="{{ Auth::user()->pincode }}">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="">Phone No</label>
                              <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="">Alternate Phone No</label>
                              <input type="text" name="alternate_phone" class="form-control" value="{{ Auth::user()->alternate_phone }}">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <button type="submit" class="mt-4 btn btn-warning">Update Profile</button>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                             @if(Auth::user()->profile_image=='')
<img class="image rounded-circle w-75" src="{{asset('/storage/images/profile_image.png')}}" alt="profile_image" style="padding: 10px; margin: 0px; ">
@endif
                      <input type="file" name="profile_image" class="form_control"><br>
                        <img src="{{asset('uploads/user_profile/'. Auth::user()->profile_image)}}" class="image rounded-circle w-75" alt="">
                             
                             
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection