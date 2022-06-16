@extends('layouts.adminapp')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Edit Warranty Plan') }}</div>
        <div class="card-body">
          <form method="POST" action="/update">
            @csrf
			<input type="hidden" name="id" value="{{ $planinfo['id'] }}" />
            <div class="row mb-3">
              <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
              <div class="col-md-6">
                <input id="plan_name" type="text" class="form-control @error('plan_name') is-invalid @enderror" name="plan_name" value="{{ $planinfo['plan_name'] }}"  autocomplete="plan_name" required>
                @error('plan_name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror </div>
            </div>
            <div class="row mb-3">
              <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Warranty In Days') }}</label>
              <div class="col-md-6">
                <input id="days_warranty" type="number" class="form-control @error('days_warranty') is-invalid @enderror" name="days_warranty" value="{{ $planinfo['days_warranty'] }}" required >
                @error('days_warranty') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror </div>
            </div>
            <div class="row mb-3">
              <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>
              <div class="col-md-6">
                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $planinfo['country'] }}" required >
                @error('country') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror </div>
            </div>
            <div class="row mb-3">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Warranty Start') }}</label>
              <div class="col-md-6">
                <select id="warranty_start" class="form-control" name="warranty_start" >
                  <option value="Delivery day" {{($planinfo['warranty_start']) == "Delivery day" ? "selected" : "" }}>Delivery day</option>
                  <option value="invoice emitting day" {{($planinfo['warranty_start']) == "invoice emitting day" ? "selected" : "" }}>Invoice emitting day</option>
                  <option value="manual day set" {{($planinfo['warranty_start']) == "manual day set" ? "selected" : "" }}>Manual day set</option>
                </select>
              </div>
            </div>
            <div class="row mb-0">
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