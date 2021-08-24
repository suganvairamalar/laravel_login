@extends('layouts.admin')
@section('content')
<div class="container-fluid mt-5">
<!-- Heading -->
<div class="card mb-4 wow fadeIn">
   <!--Card content-->
   <div class="card-body d-sm-flex justify-content-between">
      <h4 class="mb-2 mb-sm-0 pt-1">
         <a href="https://mdbootstrap.com/docs/jquery/" target="_blank">Home Page</a>
         <span>/</span>
         <span>Registered Users - Edit Role</span>
      </h4>
   </div>
</div>
<!-- Heading -->
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
               {{ session('status') }}
            </div>
            @endif
            <form action="{{url('role-update/'.$user_roles->id)}}" method="POST">
               {{ csrf_field() }}
               @method('PUT')      
               <h4>Current Role:{{$user_roles->role_as}}</h4>
               <h5>
                  Ban Status:
                  @if($user_roles->is_ban =='0')
                  <label class="badge py-2 px-3 btn-success">Active</label>              
                  @elseif($user_roles->is_ban=='1')
                  <label class="badge py-2 px-3 btn-danger">De-Active</label>                  
                  @endif 
               </h5>
               <div class="form-group">
                  <input type="text" name="name" class="form-control" value="{{$user_roles->name}}">
               </div>
               <div class="form-group">
                  <input type="text" name="email" class="form-control" value="{{$user_roles->email}}" readonly="true">
               </div>
               <div class="form-group">
                  <select name="roles" class="form-control" >
                     <option value="">--Select Role--</option>
                     <option {{ ($user_roles->role_as) == 'user' ? 'selected' : '' }}  value="user">User</option>
                     <option {{ ($user_roles->role_as) == 'admin' ? 'selected' : '' }}  value="admin">Admin</option>
                  </select>
               </div>
               <div class="form-group">
                  <select name="isban" class="form-control">
                     <option disabled="disabled">--Select Active/DeActive--</option>
                     <!-- <option value="0">Not Banned</option>
                        <option value="1">Banned</option> -->
                     <option {{ ($user_roles->is_ban) == '0' ? 'selected' : '' }}  value="0">Active </option>
                     <option {{ ($user_roles->is_ban) == '1' ? 'selected' : '' }}  value="1">De-Active</option>
                  </select>
               </div>
               <div class="form-group">
                  <button type="submit" class="btn btn-warning">Update</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection