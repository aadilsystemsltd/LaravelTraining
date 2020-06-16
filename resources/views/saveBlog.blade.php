@extends('layouts.app')

@section('content')
<style>
    label {
        font-size: large;
    }

    #addBtn {
        margin-left: -14px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Add New Blog</h1>
            </div>

            <div class="panel-body">
                <!-- Display Validation Errors -->
                @include('common.errors')

                {{-- {{-- <!-- New Blog Form --> --}}
                <form action="{{ url('/saveBlog')}}" method="POST" class="form-horizontal"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <!-- Blog Title -->
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                    </div>

                    <!-- Blog Description -->
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}" required>
                    </div>

                    <!-- Blog Image -->
                    <div class="form-group">
                        <label for="image-input">Image</label>
                        <div class="custom-file">
                            <input type="file" id="upload" name="image" class="text-center center-block file-upload" required>
                            <label class="custom-file-label" for="upload">Upload Image</label>
                        </div>
                    </div>

                    <!-- Blog Author -->
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}" required>
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <button id="addBtn" type="submit" class="btn btn-primary">Add Blog</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
