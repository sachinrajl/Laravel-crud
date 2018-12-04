@extends('layouts.app')

@section('title', 'Edit Passport Details')

@section('content')
<div class="container">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <h2>Update Details</h2><br/>
  <form method="post" action="{{action('PassportController@update', $id)}}" enctype="multipart/form-data">
    @csrf
    <input name="_method" type="hidden" value="PATCH">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="email">Name:</label>
        <input type="text" class="form-control" name="name" value="{{$passport->name}}">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="email">Email:</label>
        <input type="text" class="form-control" name="email" value="{{$passport->email}}">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="number">Phone Number:</label>
        <input type="text" class="form-control" name="number" value="{{$passport->number}}">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <lable for="office">Passport Office</lable>
        <select name="office" class="form-control">
          <option value="Mumbai" @if($passport->office == "Mumbai") selected @endif>Mumbai</option>
          <option value="Chennai" @if($passport->office == "Chennai") selected @endif>Chennai</option>
          <option value="Delhi" @if($passport->office == "Delhi") selected @endif>Delhi</option>
          <option value="Bangalore" @if($passport->office == "Bangalore") selected @endif>Bangalore</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <input type="file" name="filename">
        <input type="hidden" name="hidden_filename" value="{{$passport->filename}}">
      </div>
    </div>
    @if(!empty($passport->filename))
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <img src="{{URL::asset('/')}}images/{{$passport->filename}}" height="120" width="120">
      </div>
    </div>
    @endif
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
    autoclose: true,
    format: 'dd-mm-yyyy'
  });
</script>

@endsection