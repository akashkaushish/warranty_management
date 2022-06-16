@extends('layouts.beforeloginapp')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Check Drive Warranty') }}</div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block"> <strong>{{ $message }}</strong> </div>
        @endif
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block"> <strong>{{ $message }}</strong> </div>
        @endif
        @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-block"> <strong>{{ $message }}</strong> </div>
        @endif
        @if ($message = Session::get('info'))
        <div class="alert alert-info alert-block"> <strong>{{ $message }}</strong> </div>
        @endif
        <div class="card-body">
          <form method="POST" action="/searchplan">
            @csrf
            <div class="row mb-3">
              <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Enter Serial Number') }}</label>
              <div class="col-md-6">
                <input id="serial_number" type="text" class="form-control @error('serial_number') is-invalid @enderror" name="serial_number"  autocomplete="serial_number" required>
                @error('serial_number') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror </div>
            </div>
            <div class="row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary"> {{ __('Check') }} </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 