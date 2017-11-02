@extends('admin.master')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Post</h1>
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
                            <th>Post Title</th>
                            <th>Breaking News</th>
                            <th>Post Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;?>
                        @foreach($posts as $post)
                        <tr class="odd gradeX">
                            <td>{{ $i++ }}</td>
                            <td>{{ $post->post_title }}</td>
                            <td>{{ $post->breaking_news ? $post->breaking_news : 'NULL' }}</td>
                            <td><img src="{{ asset($post->post_image) }}" alt="Post Image" width="60" height="60"></td>
                            <td class="center">
                                <a href="{{ url('/view-post/'.$post->id) }}" class="btn btn-info btn-xs" title="View Post">
                                    <span class="glyphicon glyphicon-zoom-in"></span>
                                </a>
                                @if($post->publication_status == 1)
                                    <a href="{{url('/unpublished-post/'.$post->id)}}"
                                       class="btn btn-success btn-xs" title="Unpublished Post">
                                        <span class="glyphicon glyphicon-arrow-up"></span>

                                    </a>
                                @else
                                    <a href="{{url('/published-post/'.$post->id)}}"
                                       class="btn btn-warning btn-xs" title="Published Post">
                                        <span class="glyphicon glyphicon-arrow-down"></span>

                                    </a>
                                @endif
                                <a href="{{ url('/edit-post/'.$post->id) }}" class="btn btn-info btn-xs" title="Edit Post"><span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{ url('/delete-post/'.$post->id) }}" class="btn btn-danger btn-xs" title="Delete Post" onclick="return confirm('Are you sure to delete this !!'); ">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
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