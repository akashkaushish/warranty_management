@extends('layouts.adminapp')

@section('content')
<div class="recent_orders">
  <div class="card">
    <div class="card-header">Warranty Plans <a href="{{ url('/createwarranty') }}" style="float:right"> <button type="button"  class="btn btn-primary"> Add New Warranty Plans </button></a></div> 
    @if(session('status'))
    <div class="alert alert-success"> {{ session('status') }} </div>
    @endif
    <div class="card-body table-responsive">
      <table class="table">
        <tbody>
          <tr>
             <tr>
                <th scope="col">Name</th>
                <th scope="col">Warranty Days</th>
                <th scope="col">Country Name</th>
                <th scope="col">Country Warranty Start</th>
                <th scope="col">Action</th>
              </tr>
          </tr>
               @foreach($planlist as $plan)
            <tr>
              <td>{{$plan['plan_name']}}</td>
              <td>{{$plan['days_warranty']}}</td>
              <td>{{$plan['country']}}</td>
              <td>{{$plan['warranty_start']}}</td>
              <td><a href={{"editwarranty/".$plan['id']}}>Edit</a> &nbsp;&nbsp;<a onclick="return confirm('Are you sure to delete?');" href={{"delete/".$plan['id']}}>Delete</a></td>
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