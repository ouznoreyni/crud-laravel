@extends('layouts.base')

<form action="{{  route('cards.store') }}" method="post" class="form-inline">
    @csrf
    <label class="sr-only" for="content">Name</label>
    <input name="content" type="text" class="form-control mb-2 mr-sm-2" id="content" placeholder="Jane Doe">
    @error('content')
    <div class="text-red-500 mt-2 text-sm">
        {{ $message }}
    </div>
@enderror
    <button type="submit" class="btn btn-primary mb-2">Submit</button>
  </form>


@if ($cards->count())
  @foreach($cards as $card)
			<div class="box panel panel-default">
				<h2>{{$card->content}}</h2>
                <a href="{{ route('cards.index') }}">
                    edit
                </a>
                <form action="{{ route('cards.destroy', $card) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Delete</button>
                </form>
			</div>
	@endforeach

    @else
    <p>There are no posts</p>
@endif
