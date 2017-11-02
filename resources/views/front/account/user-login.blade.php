@extends('front.master');
@section('content')
    <div class="wrap">
        <div class="row">
            <div class="col-sm-6">
                <div class="panel-body">
                    <h1 class="text-success text-center">Login Form</h1>
                    <hr/>
                    <form class="form-horizontal" action="{{ url('/customer-login') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-sm-3">Email Address</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control"/>
                                {{ $errors->has('email') ? $errors->first('email') : ' ' }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control"/>
                                {{ $errors->has('password') ? $errors->first('password') : ' ' }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Login"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel-body">
                    <h1 class="text-success text-center">Registration Form</h1>
                    <hr/>
                    <form class="form-horizontal" action="{{ url('/new-customer') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="full_name">Full Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="full_name" class="form-control"/>
                                {{ $errors->has('full_name') ? $errors->first('full_name') : ' ' }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="user_name">User Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="user_name" class="form-control" id="user_name"/>
                                {{ $errors->has('user_name') ? $errors->first('user_name') : ' ' }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Email Address</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="email"/>
                                {{ $errors->has('email') ? $errors->first('email') : ' ' }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="password">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" id="password"/>
                                {{ $errors->has('password') ? $errors->first('password') : ' ' }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Registration"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection