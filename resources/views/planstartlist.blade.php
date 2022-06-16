@extends('layouts.adminapp')

@section('content')
<div class="recent_orders">
  <div class="card">
    <div class="card-header">Plan List <a href="{{ url('/createplan') }}" style="float:right"> <button type="button"  class="btn btn-primary"> Add New Plan </button></a></div> 
    @if(session('status'))
    <div class="alert alert-success"> {{ session('status') }} </div>
    @endif
    <div class="card-body table-responsive">
      <table class="table">
        <tbody>
          <tr>
            <th scope="col">Distributor Name </th>
            <th scope="col">Warranty Plan</th>
            <th scope="col">Country Name</th>
            <th scope="col">Serial Number</th>
            <th scope="col">Sale Date</th>
            <th scope="col">Delivery Date</th>
            <th scope="col">Box Id</th>
            <th scope="col">Action</th>
          </tr>
              @foreach($planlist as $plan)
            <tr>
             <td>{{$plan->distributor_name;}}</td>
              <td>{{$plan->plan_name}}</td> 
              <td>{{$plan->country}}</td>
              <td>{{$plan->serial_number}}</td>
              <td>{{$plan->sale_date}}</td>
              <td>{{$plan->delivery_date}}</td>
              <td>{{$plan->box_id}}</td>
              <td><a href={{"editplan/".$plan->id}}>Edit</a> &nbsp;&nbsp;<a onclick="return confirm('Are you sure to delete?');" href={{"deleteplan/".$plan->id}}>Delete</a></td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <nav class="pagination_container"> <!-- <ul class="pagination">
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