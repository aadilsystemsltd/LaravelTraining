@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="panel-heading" style="margin-left: 20px;">
            <h1>List of blogs</h1>
        </div>
    </div>

    <div class="row">
        @forelse ($blogs as $i)
        <div class="card" style="margin-left: 20px;">
            <img class="card-img-top" src="{{asset('/storage/uploads/'.$i->image)}}" alt="Card image cap"
                style="height: 100px;width:100px;">

            <form action="{{ url('/addComment')}}" method="POST">
                {{ csrf_field() }}
                <div class="card-body">
                    <a href="{{ url('editBlog/'.$i->id) }}"><h2 class="card-title">{{ $i->title }}</h2></a>
                    <input type="hidden" name="id" value="{{ $i->id }}">
                    <p class="card-text">{{ $i->description }}</p>
                    @if (Auth::check())
                        <textarea name="comments" class="form-control" rows="5" placeholder="Comments"></textarea>
                        <button type="submit" class="btn btn-primary" style="margin-top: 7px;">Add</button>
                    @endif
                </div>
            </form>

            <div class="card-footer text-muted">
                Posted on {{ $i->created_at }} by {{ $i->author }}
            </div>
            <div class="card-footer text-muted">
                <label>Previous Comments</label>
                @forelse ($i->comments as $item)
                <input type="text" class="form-control" value="{{ $item->comment }}" style="margin-bottom: 5px;" readonly>
                @empty
                <label>No Previous Comments</label>
                @endforelse
            </div>
        </div>
        @empty
        <div class="panel-heading">
            <h1>There is No Record In database. Please Add New Blog.!<h1>
        </div>
        @endforelse
    </div>
@endsection
