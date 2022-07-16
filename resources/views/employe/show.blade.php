@extends('template.master')
@section('content')
<br>
<div class="card">
    <h5 class="card-header">Employes / Detail</h5>
    <div class="card-body">
      <p class="card-text"> Name     :{{$employe->fullname}}</p>
      <p class="card-text"> Email    :{{$employe->email}}</p>
      <p class="card-text"> Department  :{{$employe->department}}</p>
      <p class="card-text"> Phone    :{{$employe->phone}}</p>
      <a href="{{route('employe.index')}}" class="btn btn-light">Back</a>
    </div>
  </div>
@endsection