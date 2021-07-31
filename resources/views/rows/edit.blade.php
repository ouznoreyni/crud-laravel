@extends('layouts.base')
@section('content')
@if ($row)
<form action="{{  route('rows.update', $row) }}" method="post" class="col-6 form-inline mt-2">
  @csrf
  <label class="sr-only" for="title">title</label>
  <input name="title" type="text" class="form-control col-7" id="title" placeholder="Add Row" value="{{$row->title}}">
  @error('title')
  <div class="text-red-500 mt-2 text-sm">
      {{ $message }}
  </div>
@enderror
@method('PUT')
  <button type="submit" class="btn btn-primary col-3">Submit</button>
</form>
@else
     <p>cannot update row</p> 
@endif
<a  href="{{  route('rows.index') }}" class="btn btn-warning mt-4 mr-1">cancel update</a>

@endsection('content')

