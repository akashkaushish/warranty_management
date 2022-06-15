@extends('layouts.adminapp')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Edit Activate Warranty Plan') }}</div>
        <div class="card-body">
        <form method="POST" action="/updateplan">
          @csrf
          <input type="hidden" name="id" value="{{ $planinfo['id'] }}" />
          <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Distributor Name') }}</label>
            <div class="col-md-6">
              <input id="distributor_name" type="text" class="form-control @error('distributor_name') is-invalid @enderror" name="distributor_name" value="{{ $planinfo['distributor_name'] }}"  autocomplete="plan_name" required>
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
                <option value="{{$warrantyplan->id}}" {{ ($warrantyplan->id) == $planinfo['warranty_plan_id'] ? 'selected' : '' }} >{{$warrantyplan->plan_name }}</option>
			   @endforeach			  
              </select>             
            </div>
          </div>
          <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Serial Number') }}</label>
            <div class="col-md-6">
              <input id="serial_number" type="text" class="form-control @error('serial_number') is-invalid @enderror" name="serial_number" value="{{ $planinfo['serial_number'] }}"  autocomplete="serial_number" required>
              @error('serial_number') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror </div>
          </div>
          <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Sale Date') }}</label>
            <div class="col-md-6">
              <input id="sale_date" type="text" class="form-control @error('sale_date') is-invalid @enderror" name="sale_date" value="{{ $planinfo['sale_date'] }}"  autocomplete="plan_name" required>
              @error('sale_date') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror </div>
          </div>
          <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Delivery Date') }}</label>
            <div class="col-md-6">
              <input  type="text" class="form-control @error('delivery_date') is-invalid @enderror" name="delivery_date" value="{{ $planinfo['delivery_date'] }}"  autocomplete="delivery_date" required>
              @error('delivery_date') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror </div>
          </div>
          <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>
            <div class="col-md-6">
              <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $planinfo['country'] }}" required >
              @error('country') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror </div>
          </div>
          <div class="row mb-3">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Box Id') }}</label>
            <div class="col-md-6">
              <input id="box_id" type="text" class="form-control @error('box_id') is-invalid @enderror" name="box_id" value="{{ $planinfo['box_id'] }}" required >
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
@endsection 