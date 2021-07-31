@extends('layouts.base')
@section('content')

<div class="row m-5">
  @forelse($rows as $row)
  
  <div class="card m-2" style="width: 18rem; max-height: 500px;">
    <div class="card-header">
       <div class="row">
        {{$row->title}}
       </div>

       <div class="row float-right">
        <a class="btn btn-sm mr-1 btn-outline-info text-danger" href="{{ route('rows.edit', $row) }}">edit </a>
        <form  class="d-inline-block" action="{{ route('rows.destroy', $row) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger text-dark">Delete</button>
        </form>
       </div>
    </div>

  
    <ul class="list-group list-group-flush overflow-auto">
      @foreach ($row->cards as $card)
      <li class="list-group-item">
        <h4> {{$card->content}}</h4>
        <div class="mt-2" >
          <a class="btn btn-sm btn-outline-info text-dark" href="{{ route('cards.edit', $card) }}">
              edit
          </a>
          <form  class="d-inline-block" action="{{ route('cards.destroy', $card) }}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-outline-danger text-dark">Delete</button>
          </form>
         </div>
      </li>
      
      @endforeach
      
      <li class="list-group-item">
        <form action="{{  route('cards.store', $row) }}" method="post" class="form-inline">
            @csrf
            <label class="sr-only" for="content">content</label>
            <input name="content" type="text" class="form-control col-7" id="content" placeholder="add card">
            @error('content')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
        @enderror
            <button type="submit" class="btn btn-primary col-4">add</button>
          </form>
      </li>
    </ul>
  </div>
  
  @empty
@endforelse
<div>
    <form action="{{  route('rows.store') }}" method="post" class="form-inline mt-2">
        @csrf
        <label class="sr-only" for="title">Name</label>
        <input name="title" type="text" class="form-control col-7" id="title" placeholder="add Row">
        @error('title')
        <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
        </div>
    @enderror
        <button type="submit" class="btn btn-primary col-3">Submit</button>
      </form>
</div>
</div>

@ensection
