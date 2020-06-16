@extends('layouts.app')

@section('content')

<style>
    label {
        font-size: large;
    }

    #editBtn {
        margin-left: -14px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Edit Blog</h1>
            </div>
            <div class="panel-body">
                <!-- Display Validation Errors -->
                @include('common.errors')

                {{-- {{-- <!-- New Blog Form --> --}}
                <form action="{{ url('/saveEditedBlog')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- Blog Title -->
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="hidden" name="id" value="{{ $blog->id }}">
                        <input type="text" name="title" id="title" class="form-control" value="{{ $blog->title }}" required>
                    </div>

                    <!-- Blog Description -->
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" class="form-control"
                            value="{{ $blog->description }}" required>
                    </div>

                    <!-- Blog Image -->
                    <div class="form-group">
                        <label for="image-input">Image</label>
                        <input type="file" name="editImage" class="form-control-file">
                    </div>

                    <!-- Blog Author -->
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" name="author" id="author" class="form-control" value="{{ $blog->author }}" required>
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <button id="editBtn" type="submit" class="btn btn-primary">Edit Blog</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
