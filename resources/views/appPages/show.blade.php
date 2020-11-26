  
@extends('layout')

@section('content')

<h1 class='text-center m-3'>View Application</h1>

<form  class='col-lg-7 text-center mx-auto' >

    <div class="form-group">
      <label>Name</label>
      <input disabled class='form-control' placeholder='Name...' type="text" value="{{$application->name}}" name="name">
    </div>

    <div class="form-group" style="width: 45rem">
      {{-- <label>Image</label> --}}
      <img class="img-responsive w-100 " src="{{ $application->image_url }}" alt="">
    </div>

    <div class="form-group">
      <label>Description</label>
      <div>
        {!! $application->description !!}
      </div>
    </div>

    <div class="form-group">
      <label>Finish date</label>
      <input disabled class='form-control' data-toggle="datepicker" type="text" name="finish_date" value="{{ $application->finish_date }}">
    </div>

    <div class="form-group">
      <label>Status</label>
      <input disabled class='form-control' type="text" name="status" value="{{ $application->status->name }}">
    </div>
  </form>
@endsection