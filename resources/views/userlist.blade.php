@extends('layouts.adminapp')

@section('content')
<div class="recent_orders">
  <div class="card">
    <div class="card-header">Users List</div>
    @if(session('status'))
    <div class="alert alert-success"> {{ session('status') }} </div>
    @endif
    <div class="card-body table-responsive">
      <table class="table">
        <tbody>
          <tr>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Company Name</th>
            <th scope="col">Mobile</th>
            <th scope="col">Address</th>
            <th scope="col">DB </th>
            <th scope="col">Repo </th>
            <th scope="col">Envirment</th>
            <th scope="col">Action</th>
          </tr>
          </tr>
        
        @foreach($userlist as $plan)
        <tr>
          <td>{{$plan->name}}</td>
          <td>{{$plan->email}}</td>
          <td>{{$plan->company_name}}</td>
          <td>{{$plan->mobile_number}}</td>
          <td>{{$plan->address}}</td>
          <td> @if($plan->is_db_created ==0)            
            No            
            @else            
            Yes            
            @endif</td>
           <td> @if($plan->is_repo_created ==0)            
            No            
            @else            
            Yes            
            @endif</td>
           <td> @if($plan->is_env_configured ==0)            
            No            
            @else            
            Yes            
            @endif</td>
          <td><a href="">Setup Url</a> &nbsp;&nbsp;<a onclick="return confirm('Are you sure to delete?');" href="">Create Database</a></td>
        </tr>
        @endforeach
        </tbody>
        
      </table>
    </div>
    <nav class="pagination_container">
      <!-- <ul class="pagination">
        <li class="page-item"> <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a> </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"> <a class="page-link" href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a> </li>
      </ul>-->
    </nav>
  </div>
</div>
@endsection