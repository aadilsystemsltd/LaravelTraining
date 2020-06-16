@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-3">
                <div class="text-center">
                    <img src="{{asset('/storage/uploads/'.$user->image)}}" class="avatar img-circle img-thumbnail"
                        alt="avatar">
                </div>
            </div>

            <div class="col-sm-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="home">

                        <form class="form">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="name">
                                        <h4>First name</h4>
                                    </label>
                                    <label id="name" class="form-control">{{$user->name}}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="dob">
                                        <h4>Last name</h4>
                                    </label>
                                    <label id="dob" class="form-control">{{$user->dob}}</label>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="email">
                                        <h4>Email</h4>
                                    </label>
                                    <label id="email" class="form-control">{{$user->email}}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <a class="btn btn-primary" href="{{ url('getEditProfile') }}">Update Profile</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!--/tab-content-->
        </div>
        <!--/col-9-->
    </div>
    <!--/row-->
</div>
@endsection
