@extends('layouts.app')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
    rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<style>
    #upload {
        margin-left: 35px;
    }
</style>
<div class="container">
    <div class="container bootstrap snippet">
        <form class="form" action="{{ url('/postProfile')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-3">
                    <div class="text-center">
                        <img src="{{asset('/storage/uploads/'.$user->image)}}" class="avatar img-circle img-thumbnail" alt="avatar">
                        <div class="custom-file">
                            <input type="file" id="upload" name="image" class="text-center center-block file-upload">
                            <label class="custom-file-label" for="upload">Upload Image</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-9">
                    <!-- Display Validation Errors -->
                    @include('common.errors')


                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="name">
                                <h4>Name</h4>
                            </label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="datepicker">
                                <h4>Date of Birth</h4>
                            </label>
                            <input type="text" id="datepicker" class="form-control" name="dob" value="{{ $user->dob }}" required>
                            @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="email">
                                <h4>Email</h4>
                            </label>
                            <input type="text" id="email" class="form-control" name="email" value="{{ $user->email }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="password">
                                <h4>Password</h4>
                            </label>
                            <input id="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="confirmPassword">
                                <h4>Confirm Password</h4>
                            </label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
         });
});
</script>
@endsection
