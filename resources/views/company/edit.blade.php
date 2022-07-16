@extends('template.master')
@section('content')

  {{-- <div class="col-md-6 d-flex align-items-stretch grid-margin"> --}}
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Company</h4>
            <form class="forms-sample" method="POST" action="{{route('company.update',$company->company_id)}}">
                @csrf
                @method('PATCH')
              <div class="form-group">
                <label class="form-label">Name</label>
                <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror"  value="{{old('company_name') ? old('company_name') : $company->company_name}}" placeholder="Name">
                @error('company_name')
                <div class="invalid-feedback">
                    {{ $message }}    
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email"  class="form-control  @error('company_name') is-invalid @enderror" name="company_email"  value="{{old('company_email') ? old('company_email') : $company->company_email}}"  placeholder="Email">
                @error('company_email')
                <div class="invalid-feedback">
                    {{ $message }}    
                </div>
                @enderror
            </div>
            
              <div class="form-group">
                <label class="form-label">Address</label>
                <input type="text"  value="{{old('company_address') ? old('company_address') : $company->company_address}}"  class="form-control  @error('company_address') is-invalid @enderror" name="company_address" placeholder="Address">
                @error('company_address')
                <div class="invalid-feedback">
                    {{ $message }}    
                </div>
                @enderror
            </div>

              <div class="form-group">
                <label class="form-label">Phone</label>
                <input type="text"  value="{{old('company_phone') ? old('company_phone') : $company->company_phone}}"  class="form-control  @error('company_phone') is-invalid @enderror" name="company_phone" placeholder="Phone">
                @error('company_phone')
                <div class="invalid-feedback">
                    {{ $message }}    
                </div>
                @enderror
            </div>

              <br>
              <button type="submit" class="btn btn-success mr-2">Submit</button>
              <a href="{{route('company.index')}}" class="btn btn-light"> Back</a>
            </form>
          </div>
        </div>
      </div>
  
 
   

@endsection