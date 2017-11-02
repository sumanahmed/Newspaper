@extends('admin.master')
@section('content')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Comments</h1>
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
                            <th>Comments</th>
                            <th>Approval Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;?>
                        @foreach($comments as $comment)
                            <tr class="odd gradeX">
                                <td>{{$i++}}</td>
                                <td class="center">{{$comment->message}}</td>
                                <td class="center">{{$comment->approval_status ==1 ? 'Approved' :'Unapproved'}}</td>
                                <td class="center">
                                    @if($comment->approval_status==1)
                                        <a href="{{url('/unapproved-comment/'.$comment->id)}}" class="btn btn-success btn-xs" title="Unapproved Comment"><span class="glyphicon glyphicon-arrow-up"></span> </a>
                                    @else
                                        <a href="{{url('/approved-comment/'.$comment->id)}}" class="btn btn-warning btn-xs" title="Approved Comment"> <span class="glyphicon glyphicon-arrow-down"></span> </a>
                                    @endif
                                    <a href="{{url('/view-comment/'.$comment->id)}}" class="btn btn-danger btn-xs" title="View Comment" > <span class="glyphicon glyphicon-zoom-in"></span></a>
                                    <a href="{{url('/delete-comment/'.$comment->id)}}" class="btn btn-danger btn-xs" title="Delete Comment"  onclick="return confirm('Are you sure to delete this !!'); "> <span class="glyphicon glyphicon-trash"></span></a>
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