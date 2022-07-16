@extends('template.master')
@section('content')

  {{-- <div class="col-md-6 d-flex align-items-stretch grid-margin"> --}}
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Employe</h4>
            <form class="forms-sample" method="POST" action="{{route('employe.store')}}">
                @csrf
              <div class="form-group">
                <label class="form-label">Name</label>
                <input type="text" name="fullname" value="{{old('fullname')}}" class="form-control  @error('fullname') is-invalid @enderror" placeholder="Name">
                @error('fullname')
                <div class="invalid-feedback">
                    {{ $message }}    
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label">Company</label>
              <select class="form-select" aria-label="Default select example" name="company">
                <option selected>Company</option>
                @foreach ($company as $item)
                  <option value="{{$item->company_id}}">{{$item->company_name}}</option>  
                @endforeach
              </select>
            </div>
            
              <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email"value="{{old('email')}}" class="form-control  @error('email') is-invalid @enderror" placeholder="Email">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}    
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label">Department</label>
                <input type="text" name="department" value="{{old('department')}}" class="form-control  @error('department') is-invalid @enderror" placeholder="Department">
                @error('department')
                <div class="invalid-feedback">
                    {{ $message }}    
                </div>
                @enderror
              </div>
            
              <div class="form-group">
                <label class="form-label">Phone</label>
                <input type="text"  name="phone" value="{{old('phone')}}" class="form-control  @error('phone') is-invalid @enderror" placeholder="Phone">
                @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}    
                </div>
                @enderror
              </div>
              <br>
              <button type="submit" class="btn btn-success mr-2">Submit</button>
              <a href="{{route('employe.index')}}" class="btn btn-light"> Back</a>
            </form>
          </div>
        </div>
      </div>
  
 
   

@endsection