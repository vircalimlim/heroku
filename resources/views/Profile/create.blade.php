@extends('layouts.app')
@section('content')
<div class="row mt-md-5 py-2 justify-content-around">
<div class="col-12 col-md-8 col-lg-7">
  
<h3>Create Profile</h3>

<form method="POST" action="/profile">
  @csrf
  
<div class="row my-4">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>Household Number</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  <input class="form-control @error('houseNum') is-invalid @enderror" type="text" name="houseNum" autocomplete="houseNum"/>
  
  @error('houseNum')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div>
  
</div>
  
<div class="row my-4">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>First Name</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  <input class="form-control @error('firstname') is-invalid @enderror" type="text" name="firstname" autocomplete="firstname"/>
  
  @error('firstname')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div>
  
</div>

<div class="row my-4">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>Middle Name</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  <input class="form-control @error('middlename') is-invalid @enderror" type="text" name="middlename" autocomplete="middlename"/>
  
  @error('middlename')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div>
  
</div>

<div class="row my-4">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>Last Name</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  <input class="form-control @error('lastname') is-invalid @enderror" type="text" name="lastname" autocomplete="lastname"/>
  
  @error('lastname')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div>
  
</div>




<div class="row">
  <div class="col text-right">
  <button type="submit" class="btn btn-dark">Submit</button>
  </div>
</div>

</form>

</div>
</div>

@endsection