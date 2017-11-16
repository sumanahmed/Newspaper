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

                <form name="userEditForm" class="form-horizontal" action="{{ url('/update-password') }}" method="POST">
                    {{ csrf_field() }}

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="password">Old Password</label>
                            <div class="col-sm-5">
                                <input type="password" name="old_password" class="form-control" id="password"/>
                                <input type="hidden" name="db_password" class="form-control" id="password" value="{{ $passwordById->password }}" />
                                <input type="hidden" name="user_id" class="form-control" id="password" value="{{ $passwordById->id }}" />
                                {{ $errors->has('password') ? $errors->first('password') : ' ' }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="password">New Password</label>
                            <div class="col-sm-5">
                                <input type="password" name="new_password" class="form-control" id="password"/>
                                {{ $errors->has('password') ? $errors->first('password') : ' ' }}
                            </div>
                        </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" name="btn" class="btn btn-success" value="Update Password"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection