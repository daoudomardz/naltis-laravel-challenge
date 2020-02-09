@extends('layout.app')
@section('content')
<h4 class="display-4 mt-3">Edit vehicle</h4>
<form class="mt-5" action="{{route('vehicles.update',$vehicle->id)}}" method="POST">
    @csrf
    <input name="_method" type="hidden" value="PUT">
    <div class="form-group">
      <label for="make">Vehicle make</label>
      <input type="text" class="form-control" name="make" id="make" placeholder="Chevrolet, Renault, BMW ..." value="{{$vehicle->make}}">
    </div>
    <div class="form-group">
      <label for="model">Vehicle Model</label>
      <input type="text" class="form-control" name="model" id="model" placeholder="Camaro, Megane, X6 ..." value="{{$vehicle->model}}">
    </div>
    <div class="form-group">
      <label for="year">Vehicle Year</label>
      <input type="number" class="form-control" name="year" id="year" min="1700" placeholder="2020, 2012, 1996 ..." value="{{$vehicle->year}}">
    </div>
    <div class="form-group">
      <label for="type">Select vehicle type</label>
      <select class="form-control" id="type" disabled>
          
        <option value="" disabled hidden>Select a here</option>
        <option value="Car" {{$vehicle->type == 'Car'?'selected':''}}>Car</option>
        <option value="Truck" {{$vehicle->type == 'Truck'?'selected':''}}>Truck</option>
      </select>
    </div>
    <button class="btn btn-success btn-block" type="submit">Update</button>
  </form>
@endsection