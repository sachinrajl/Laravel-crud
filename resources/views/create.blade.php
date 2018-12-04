
@extends('layouts.app')

@section('title', 'Create Passport Details')

@section('content')
<div class="container">
 <br/>

 @if ($errors->any())
 <div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<h2>Appointment System</h2><br/>
<form method="post" action="{{url('passports')}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="off">
        <small class="text-danger">{{ $errors->first('name') }}</small>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="email">Email:</label>
        <input type="text" class="form-control" name="email" value="{{ old('email') }}" autocomplete="off">
        <small class="text-danger">{{ $errors->first('email') }}</small>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="number">Phone Number:</label>
        <input type="text" class="form-control" name="number" value="{{ old('number') }}" autocomplete="off">
        <small class="text-danger">{{ $errors->first('number') }}</small>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <strong>Date : </strong>
        <input class="date form-control"  type="text" id="datepicker" name="date" value="{{ old('date') }}" autocomplete="off">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <input type="file" name="filename">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <lable for="office">Passport Office</lable>
        <select name="office" class="form-control">
          <option value="Mumbai">Mumbai</option>
          <option value="Chennai">Chennai</option>
          <option value="Delhi">Delhi</option>
          <option value="Bangalore">Bangalore</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4" style="margin-top:60px">
        <button type="submit" class="btn btn-success">Submit</button>
        <a class="btn btn-danger" href="{{ route('passports.index') }}">{{ __('Cancel') }}</a>
      </div>
    </div>

  </form>


</div>
<script type="text/javascript">
  $('#datepicker').datepicker({
    autoclose: false,
    format: 'dd-mm-yyyy'
  });
</script>
@endsection