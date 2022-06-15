@extends('layouts.adminapp')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Add New Plan') }}</div>
        <div class="card-body">
        <form method="POST" action="/createplan">
          @csrf
          <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Distributor Name') }}</label>
            <div class="col-md-6">
              <input id="distributor_name" type="text" class="form-control @error('distributor_name') is-invalid @enderror" name="distributor_name"   autocomplete="distributor_name" required>
              @error('distributor_name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror </div>
          </div>
          <?php $tmp = \App\Models\Warrantyplan::all(); 
			     $result = (array) json_decode($tmp);
			?>
          <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Warranty Plan') }}</label>
            <div class="col-md-6">
              <select id="warranty_plan_id" class="form-control @error('warranty_plan_id') is-invalid @enderror" name="warranty_plan_id"  required>       
			   @foreach($result as $warrantyplan)	  
                <option value="{{$warrantyplan->id}}">{{$warrantyplan->plan_name }}</option>    
			   @endforeach
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Serial Number') }}</label>
            <div class="col-md-6">
              <input id="serial_number" type="text" class="form-control @error('serial_number') is-invalid @enderror" name="serial_number"   autocomplete="serial_number" required>
              @error('serial_number') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror </div>
          </div>
          <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Sale Date') }}</label>
            <div class="col-md-6">
              <input id="datepicker" type="text" class="datetimepicker form-control @error('sale_date') is-invalid @enderror" name="sale_date"   autocomplete="sale_date" required>
              @error('sale_date') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror </div>
          </div>
          <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Delivery Date') }}</label>
            <div class="col-md-6">
              <input id="delivery_date" type="text" class="form-control @error('delivery_date') is-invalid @enderror" name="delivery_date"   required>
              @error('delivery_date') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror </div>
          </div>
          <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>
            <div class="col-md-6">
              <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country"  required >
              @error('country') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror </div>
          </div>
          <div class="row mb-3">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Box Id') }}</label>
            <div class="col-md-6">
              <input id="box_id" type="text" class="form-control @error('box_id') is-invalid @enderror" name="box_id"  required >
              @error('box_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror </div>
          </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary"> {{ __('Save') }} </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
$( "#datepicker" ).datepicker({
format: "mm/dd/yy",
weekStart: 0,
calendarWeeks: true,
autoclose: true,
todayHighlight: true,
rtl: true,
orientation: "auto"
});
</script>
@endsection 