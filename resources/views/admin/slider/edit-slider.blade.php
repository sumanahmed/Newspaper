@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Slider</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="well" style="">

                <h1 class="text-center"> {{Session::get('message')}}</h1>

                <h4 class="text-center"> You can only add five slider </h4>
                <form action="{{ url('/update-slider') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="sliderName" class="col-sm-3 control-label">Slider Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="slider_name" class="form-control" id="sliderName" value="{{ $sliderById->slider_name }}">
                            <input type="hidden" name="slider_id" class="form-control" id="sliderName" value="{{ $sliderById->id }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sliderTitle" class="col-sm-3 control-label">Slider Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="slider_title" class="form-control" id="sliderTitle" value="{{ $sliderById->slider_title }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Slider Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="slider_image" class="form-control" accept="image/*">
                            <img src="{{ asset( $sliderById->slider_image ) }}" alt="Slider Image" width="80" height="80" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Publication Status</label>
                        <div class="col-sm-9">
                            <select name="publication_status" class="form-control">
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" name="btn" class="btn btn-success btn-block">Update Slider Info </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection