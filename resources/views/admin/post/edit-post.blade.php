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
                <h1 class="text-success"> {{Session::get('message')}}</h1>

                <form name="postEditForm" action="{{ url('/update-post') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="postTitle" class="col-sm-3 control-label">Post Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="post_title" class="form-control" id="postTitle" value="{{ $postById->post_title }}">
                            <input type="hidden" name="post_id" class="form-control"  value="{{ $postById->id }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="breakingNews" class="col-sm-3 control-label">Breaking News</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="breaking_news" rows="3" style="resize: none" id="breakingNews">{{ $postById->breaking_news }}</textarea>
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
                            <textarea class="form-control" name="short_description" rows="10" style="resize: none" id="postShortDescription">{{ $postById->short_description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="postLongDescription" class="col-sm-3 control-label">Post Long Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="long_description" rows="10" style="resize: none" id="postLongDescription">{{ $postById->long_description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Post Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="post_image" class="form-control" accept="image/*">
                            <img src="{{ asset($postById->post_image) }}" alt="" width="80" height="80" />
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
                            <button type="submit" name="btn" class="btn btn-success btn-block">Update Post Info</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.forms['postEditForm'].elements['category_id'].value = '{{ $postById->category_id }}';
        document.forms['postEditForm'].elements['tag_id'].value = '{{ $postById->tag_id }}';
        document.forms['postEditForm'].elements['publication_status'].value = '{{ $postById->publication_status }}';
    </script>
@endsection