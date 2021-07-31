@extends('layouts.base')

<form action="{{  route('rows.store') }}" method="post" class="form-inline">
    @csrf
    <label class="sr-only" for="title">Name</label>
    <input name="title" type="text" class="form-control mb-2 mr-sm-2" id="title" placeholder="Jane Doe">
    @error('title')
    <div class="text-red-500 mt-2 text-sm">
        {{ $message }}
    </div>
@enderror
    <button type="submit" class="btn btn-primary mb-2">Submit</button>
  </form>


  @forelse($rows as $row)
			<div class="box panel panel-default">
				<h2>{{$row->title}}</h2>
                <a href="{{ route('rows.index') }}">
                    edit
                </a>
                <form action="{{ route('rows.destroy', $row) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Delete</button>
                </form>
			</div>
		@empty
			<p>No rows available at this moment.</p>
		@endforelse
