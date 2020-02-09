@extends('layout.app')
@section('content')
<h4 class="display-4 mt-3">Add a new vehicle</h4>
<form class="mt-5" action="{{route('vehicles.store')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="make">Vehicle make</label>
      <input type="text" class="form-control" name="make" id="make" placeholder="Chevrolet, Renault, BMW ...">
    </div>
    <div class="form-group">
      <label for="model">Vehicle Model</label>
      <input type="text" class="form-control" name="model" id="model" placeholder="Camaro, Megane, X6 ...">
    </div>
    <div class="form-group">
      <label for="year">Vehicle Year</label>
      <input type="number" class="form-control" name="year" id="year" min="1700" placeholder="2020, 2012, 1996 ...">
    </div>
    <div class="form-group">
      <label for="type">Select vehicle type</label>
      <select class="form-control" id="type" name="type">
          
        <option value="" selected disabled hidden>Select a here</option>
        <option value="Car">Car</option>
        <option value="Truck">Truck</option>
      </select>
    </div>
    <button class="btn btn-success btn-block" type="submit">Save</button>
  </form>
@endsection