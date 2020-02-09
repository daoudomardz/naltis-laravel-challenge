@extends('layout.app')
@section('content')

<table class="table mt-5">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Model</th>
        <th scope="col">Type</th>
        <th scope="col">Brand</th>
        <th scope="col">Year</th>
        <th scope="col">Created At</th>
        <th scope="col">Last Update</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($vehicles as $v)
            <tr>
                <th scope="row">{{$v->id}}</th>
                <td>{{$v->model}}</td>
                <td>{{$v->type}}</td>
                <td>{{$v->make}}</td>
                <td>{{$v->year}}</td>
                <td>{{$v->created_at}}</td>
                <td>{{$v->updated_at}}</td>
                <td>
                  <div class="d-flex">
                    <a class="btn btn-sm btn-success" href="{{route('vehicles.edit',$v->id)}}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    <form action="{{route('vehicles.destroy',$v->id)}}" method="post">
                      <button class="btn btn-sm btn-danger" type="submit" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                      @method('delete')
                      @csrf
                  </form>
                </div>
                </td>
                
          </tr>
        @endforeach
      
      
    </tbody>
  </table>
    
@endsection