@extends('admin.master')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Slider</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>


    <div class="row">
        <div class="col-lg-12">
            @if($message=Session::get('message'))
                <h1 class="page-header text-success">{{$message}}</h1>
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
                            <th>Slider Name</th>
                            <th>Slider Title</th>
                            <th>Slider Image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;?>
                            @foreach($sliders as $slider)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $slider->slider_name }}</td>
                                <td>{{ $slider->slider_title }}</td>
                                <td>{{ $slider->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td><img src="{{ asset($slider->slider_image) }}" alt="Slider Image" width="60" height="60"></td>
                                <td class="center">

                                    <a href="" class="btn btn-primary btn-xs" title="View Slider">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>
                                    @if($slider->publication_status == 1)
                                    <a href="{{ url('/unpublished-slider/'.$slider->id) }}" class="btn btn-success btn-xs" title="Unpublished Slider">
                                        <span class="glyphicon glyphicon-arrow-up"></span>
                                    </a>
                                    @else
                                    <a href="{{ url('/published-slider/'.$slider->id) }}" class="btn btn-warning btn-xs" title="Published Slider">
                                        <span class="glyphicon glyphicon-arrow-down"></span>
                                    </a>
                                    @endif
                                    <a href="{{ url('/edit-slider/'.$slider->id) }}" class="btn btn-info btn-xs" title="Edit Slider">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>

                                    <a href="{{ url('/delete-slider/'.$slider->id) }}" class="btn btn-danger btn-xs" title="Delete Slider" onclick="return confirm('Are you sure to delete this !!'); ">
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