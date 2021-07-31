@extends('layouts.base')
@section('content')

<h1>Edit a Card</h1>

@if ($card)
<form action="{{  route('cards.update', $card) }}" method="post" class="col-6 form-inline mt-2">
  @csrf
  <label class="sr-only" for="content">content</label>
  <input name="content" type="text" class="form-control col-7" id="content" placeholder="Jane Doe" value="{{$card->content}}">
  @error('content')
  <div class="text-red-500 mt-2 text-sm">
      {{ $message }}
  </div>
@enderror
@method('PUT')
  <button type="submit" class="btn btn-primary col-3">Submit</button>
</form>
@else
     <p>cannot update card</p> 
@endif
<a  href="{{  route('rows.index') }}" class="btn btn-warning mt-4 mr-1">cancel update</a>

@endsection('content')

