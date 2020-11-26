  
@extends('layout')
@section('content')

<h1 class='text-center m-3'>New Application</h1>

<form  class='col-lg-7 text-center mx-auto' action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf

    <div class="form-group">
      <label>Name</label>
      <input class='form-control' placeholder='Name...' type="text" value="{{old('name')}}" name="name">
      @error('name')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label>Image</label>
      <input class='form-control' placeholder='Image...' type="file" accept="image/*" name="image">
      @error('image')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label>Description</label>
      <textarea class='form-control' name="description">{{ old('description') }}</textarea>
      @error('description')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label>Finish date</label>
      <input class='form-control' data-toggle="datepicker" type="text" name="finish_date" value="{{ old('finish_date') }}">
      @error('finish_date')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group">
      <label>Status</label>
      <select class='form-control' name="status_id">
          @forelse ($statuses as $status)
            <option {{ old('status_id') == $status->id ? "selected" : "" }}  value="{{$status->id}}"> {{$status->name}} </option>     
          @empty
            <option value=""> --- </option>
          @endforelse
      </select>
      @error('status_id')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script>
      ClassicEditor
      .create( document.querySelector( 'textarea' ) )
      .catch( error => {
      console.error( error );
      } );
    </script>
@endpush