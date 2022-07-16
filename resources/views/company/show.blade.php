@extends('template.master')
@section('content')
<br>
<div class="card">
    <h5 class="card-header">Companies / Detail</h5>
    <div class="card-body">
      <p class="card-text"> Name     :{{$company->company_name}}</p>
      <p class="card-text"> Email    :{{$company->company_email}}</p>
      <p class="card-text"> Address  :{{$company->company_address}}</p>
      <p class="card-text"> Phone    :{{$company->company_phone}}</p>
      <a href="{{route('company.index')}}" class="btn btn-light"> Back</a>
    </div>
  </div>
@endsection