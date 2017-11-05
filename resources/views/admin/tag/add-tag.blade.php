@extends('admin.master')
@section('content')
    <br/>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="well">

                <h2 class="text-success">{{ Session::get('message') }}</h2>

                <form action="{{ url('/new-tag') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3">Tag Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="tag_name" class="form-control"/>
                            <p class="text-danger">{{ $errors->has('tag_name') ? $errors->first('tag_name') : ' ' }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Publication Status</label>
                        <div class="col-sm-9">
                            <select name="publication_status" class="form-control">
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                            {{ $errors->has('publication_status') ? $errors->first('publication_status') : ' ' }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Tag Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection