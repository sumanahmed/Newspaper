@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add User</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="well" style="">
                <h1 class="text-center"> {{Session::get('message')}}</h1>

                <form class="form-horizontal" action="{{ url('/new-user') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="name">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control"/>
                            {{ $errors->has('name') ? $errors->first('name') : ' ' }}
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
                        <label class="control-label col-sm-3" for="role">Role</label>
                        <div class="col-sm-9">
                            <select name="role" id="role" class="form-control">
                                <option value="0">Super Admin</option>
                                <option value="1">Admin</option>
                                <option value="2">Reporter</option>
                                <option value="3">Subscriber</option>
                            </select>
                            {{ $errors->has('role') ? $errors->first('role') : ' ' }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Add User Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection