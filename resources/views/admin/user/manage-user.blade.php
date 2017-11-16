@extends('admin.master')
@section('content')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Category</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>


    <div class="row">
        <div class="col-lg-12">
            @if($message=Session::get('message'))
                <h1 class="page-header">{{$message}}</h1>
            @endif
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DataTables Advanced Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover"
                           id="dataTables-example">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;?>
                        @foreach($users as $user)
                            <tr class="odd gradeX">
                                <td>{{$i++}}</td>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td class="center">{{$user->email}}</td>
                                <td class="center">
                                    @if($user->role == 0)
                                        Super Admin
                                    @elseif($user->role == 1)
                                        Admin
                                    @elseif($user->role == 2)
                                        Reporter
                                    @else
                                        Subscriber
                                    @endif
                                </td>
                                <td class="center">
                                    <a href="{{url('/edit-user/'.$user->id)}}" class="btn btn-info btn-xs" title="Edit User"> <span class="glyphicon glyphicon-edit"></span></a>
                                    <a href="{{url('/delete-user/'.$user->id)}}" class="btn btn-danger btn-xs" title="Delete User" onclick="return confirm('Are you sure to delete this !!'); "> <span class="glyphicon glyphicon-trash"></span> </a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection