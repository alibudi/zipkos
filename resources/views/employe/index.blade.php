@extends('template.master')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Employe</h1>
  </div>

  <div class="d-grid gap-2 d-md-block">
    <a href="{{route('employe.create')}}" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-plus"></i> Add New</a>
    <a href="{{route('export-employe')}}" target="_blank" class="btn btn-outline-success btn-sm"><i class="fa-solid fa-file-excel"></i> Laporan</a>
    <form style="text-align:right" action="{{route('search-employe')}}">
        <input type="text" name="search" placeholder="Search Company Name" value="{{old('search')}}">
        <input type="submit" value="SEARCH" class="btn btn-outline-info btn-sm">
    </form>
</div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Department</th>
          <th scope="col">Phone</th>
          <th scope="col">Company</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($employe as $item)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$item->fullname}}</td>
          <td>{{$item->email}}</td>
          <td>{{$item->department}}</td>
          <td>{{$item->phone}}</td>
          <td>{{$item->company_name}}</td>
          <td>
              <form action="{{ route('employe.destroy',$item->id) }}" method="POST">
                   <a class="btn btn-info btn-xs" href="{{route('employe.show',$item->id)}}"><div class="fa-solid fa-eye"></div></a> 
                    <a class="btn btn-primary btn-xs" href="{{ route('employe.edit',$item->id) }}"><i class="fa-solid fa-pen"></i></a> 
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash"></i></button>
                </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div style="text-align: right">
    {{$employe->links('pagination::bootstrap-4')}}
    </div>
  </div>
@endsection