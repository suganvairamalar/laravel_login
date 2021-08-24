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
            <span>Registered Users</span>
          </h4>         

        </div>

      </div>
      <!-- Heading -->
      <div class="row">
        <div class="col-md-6">
           <form action="{{url('registered-user')}}" method="GET">
              <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <select class="form-control" name="roles">
                           @if(isset($_GET['roles']))
                           <option value="{{$_GET['roles']}}">{{$_GET['roles']}}</option>
                           <option value="">Select</option>
                           <option value="user">User</option>
                           <option value="admin">Admin</option>
                           
                           @else
                           <option value="">Select</option>
                           <option value="user">User</option>
                           <option value="admin">Admin</option>
                          
                           @endif
                        </select> 
                     </div>                     
                  </div>
                  <div class="col-md-6">
                     <button type="submit" class="py-2 mt-0 btn btn-info">Filter By Role</button>
                  </div>                 
              </div>
           </form>       
        </div>
        
      </div>
      <div class="row">
          <div class="col-md-12">
                <div class="card">
                      <div class="card-body">
                         <table id="user_table" class="table table-bordered table-hover table-striped">
                           <thead>
                             <tr>
                               <th>ID</th>
                               <th>NAME</th>
                               <th>EMAIL</th>
                               <th>ROLE</th>
                               <th>ACTIVE/DEACTIVE</th>
                               <th>ACTION</th>
                             </tr>
                           </thead>
                           <tbody>
                             @foreach($users as $item)
                             <tr>
                               <td>{{$item->id}}</td>
                               <td>{{$item->name}}</td>
                               <td>{{$item->email}}</td>
                               <td>{{$item->role_as}}</td>
                               <td>
                                 @if($item->is_ban =='0')
                           <label class="badge py-2 px-3 btn-success">Active</label>              
                           @elseif($item->is_ban=='1')
                           <label class="badge py-2 px-3 btn-danger">De-Active</label>                  
                           @endif 
                               </td>
                               <td>
                                 <a href="{{url('role-edit/'.$item->id)}}" class="badge badge-pill btn btn-warning px-3 py-2" id="{{$item->id}}">EDIT</a>
                                 <a href=""  class="badge badge-pill btn btn-danger px-3 py-2" id="{{$item->id}}">DELETE</a>
                               </td>
                             </tr>
                             @endforeach
                           </tbody>
                         </table>
                    
                      </div>
                </div>
          </div>
          
      </div>

      @section('scripts')
     <script type="text/javascript">
       $(document).ready( function () {
    $('#user_table').DataTable();
} );
     </script>
      @endsection
     
     @endsection

     