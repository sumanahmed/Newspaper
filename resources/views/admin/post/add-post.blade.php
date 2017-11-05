@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Post</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="well" style="">
                <h1 class="text-success text-center"> {{Session::get('message')}}</h1>
                <form action="{{ url('/new-post') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="postTitle" class="col-sm-3 control-label">Post Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="post_title" class="form-control" id="postTitle" placeholder="Post Title">
                            <p class="text-danger">{{ $errors->has('post_title') ? $errors->first('post_title') : ' ' }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="breakingNews" class="col-sm-3 control-label">Breaking News</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="breaking_news" rows="3" style="resize: none" id="breakingNews"></textarea>
                            <p class="text-danger">{{ $errors->has('breaking_news') ? $errors->first('breaking_news') : ' ' }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Category</label>
                        <div class="col-sm-9">
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tag</label>
                        <div class="col-sm-9">
                            <select name="tag_id" class="form-control">
                                @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="postShortDescription" class="col-sm-3 control-label">Post Short Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="short_description" rows="10" style="resize: none" id="postShortDescription"></textarea>
                            <p class="text-danger">{{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="postLongDescription" class="col-sm-3 control-label">Post Long Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="long_description" rows="10" style="resize: none" id="postLongDescription"></textarea>
                            <p class="text-danger">{{ $errors->has('long_description') ? $errors->first('long_description') : ' ' }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Post Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="post_image" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Publication Status</label>
                        <div class="col-sm-9">
                            <select name="publication_status" class="form-control">
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                            {{ $errors->has('publication_status') ? $errors->first('publication_status') : ' ' }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" name="btn" class="btn btn-success btn-block">Save Post Info</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection