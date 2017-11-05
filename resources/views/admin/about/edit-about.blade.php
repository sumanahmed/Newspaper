@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update Pages Content</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="well" style="">
                <h1 class="text-center"> {{Session::get('message')}}</h1>
                @foreach($pagesContents as $pagesContent)
                <form action="{{ url('/update-pages') }}" method="POST" class="form-horizontal">
                    {{csrf_field()}}
                    <h2 class="text-center text-success">About Page Content</h2>

                    <div class="form-group">
                        <label for="pageTitle" class="col-sm-3 control-label">About Page Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="about_page_title" class="form-control" id="pageTitle" value="{{ $pagesContent->about_page_title }}">
                            <input type="hidden" name="page_id" class="form-control" id="pageTitle" value="{{ $pagesContent->id }}">
                            {{ $errors->has('about_page_title') ? $errors->first('about_page_title') : ' ' }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pageSubTitle" class="col-sm-3 control-label">About Page Sub Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="about_page_sub_title" class="form-control" id="pageSubTitle" value="{{ $pagesContent->about_page_sub_title }}">
                            {{ $errors->has('about_page_sub_title') ? $errors->first('about_page_sub_title') : ' ' }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contentDescription" class="col-sm-3 control-label">About Page Content</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="about_page_content" rows="10" style="resize: none" id="contentDescription">{{ $pagesContent->about_page_content }}</textarea>
                            {{ $errors->has('about_page_sub_title') ? $errors->first('about_page_sub_title') : ' ' }}
                        </div>
                    </div>

                    <h2 class="text-center text-success">Contact Page Content</h2>

                    <div class="form-group">
                        <label for="address" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="address" rows="10" style="resize: none" id="categoryDescription">{{ $pagesContent->address }}</textarea>
                            {{ $errors->has('address') ? $errors->first('address') : ' ' }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" name="email" class="form-control" id="email" value="{{ $pagesContent->email }}">
                            {{ $errors->has('email') ? $errors->first('email') : ' ' }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mobile_no" class="col-sm-3 control-label">Mobile</label>
                        <div class="col-sm-9">
                            <input type="text" name="mobile_no" class="form-control" id="mobile_no" value="{{ $pagesContent->mobile_no }}">
                            {{ $errors->has('mobile_no') ? $errors->first('mobile_no') : ' ' }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gmap" class="col-sm-3 control-label">Map Link</label>
                        <div class="col-sm-9">
                            <input type="text" name="gmap" class="form-control" id="gmap" value="{{ $pagesContent->gmap }}">
                            {{ $errors->has('gmap') ? $errors->first('gmap') : ' ' }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" name="btn" class="btn btn-success btn-block">Update Pages Info
                            </button>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>

@endsection