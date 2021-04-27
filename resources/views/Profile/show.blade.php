@extends('layouts.app')
@section('content')

<h3>{{$profile->lastname}}</h3>
@if(!$work) 
<!-- if($work || $student) -->

<select-option profileid="{{$profile->id}}">
  
  <template v-slot:work>
  @csrf
  <div class="row my-4">
    <div class="col-12 my-2">
      <span>Profession/Work</span>
    </div>
    <div class="col-12">
      <input class="form-control @error('profession') is-invalid @enderror" type="text" name="profession" value="{{ old('profession') }}" autocomplete="off" autofocus/>
      @error('profession')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>
  
  <div class="row my-4">
    <div class="col-12 my-2">
      <span>Workplace</span>
    </div>
    <div class="col-12">
      <input class="form-control @error('workplace') is-invalid @enderror" type="text" name="workplace" value="{{ old('workplace') }}" autocomplete="off" autofocus/>
    </div>
  </div>
  
  </template>
  
  <template v-slot:student>
    @csrf
    
  <div class="row my-4">
    <div class="col-12 my-2">
      <span>Name of School</span>
    </div>
    <div class="col-12">
      <input class="form-control @error('school') is-invalid @enderror" type="text" name="school" value="{{ old('school') }}" autocomplete="off" autofocus/>
      @error('school')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>
  
  <educ-level>

  </educ-level>
  

  
  </template>
</select-option>

@else
{{$profile->work}}
<span>Display dara of work</span>


@endif
@endsection