@extends('template.master')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Company</h1>
  </div>

  <div class="d-grid gap-2 d-md-block">
        <a href="{{route('company.create')}}" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-plus"></i> Add New</a>
        <a href="{{route('export-company')}}" target="_blank" class="btn btn-outline-success btn-sm"><i class="fa-solid fa-file-excel"></i> Laporan</a>
        <form style="text-align:right" action="{{route('search')}}">
            <input type="text" name="search" placeholder="Search Company Name" value="{{old('search')}}">
            <input type="submit" value="Search" class="btn btn-outline-info btn-sm">
        </form>
 </div>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Address</th>
          <th scope="col">Phone</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($company as $item)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$item->company_name}}</td>
          <td>{{$item->company_email}}</td>
          <td>{{$item->company_address}}</td>
          <td>{{$item->company_phone}}</td>
          <td>

              <form action="{{ route('company.destroy',$item->company_id) }}" method="POST">
                   <a class="btn btn-info btn-xs" href="{{route('company.show',$item->company_id)}}"><div class="fas fa-eye"></div></a> 
                    <a class="btn btn-primary btn-xs" href="{{ route('company.edit',$item->company_id) }}"><i class="fas fa-pen"></i></a> 
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></button>
                </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div style="text-align: right">
        {{$company->links('pagination::bootstrap-4')}}
        </div>
  </div>
@endsection