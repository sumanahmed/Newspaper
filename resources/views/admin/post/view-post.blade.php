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
            <div class="panel-body">
                <table width="80%" class="table table-bordered">
                    <tr>
                        <th>Post Title</th>
                        <td>{{ $postById->post_title }}</td>
                    </tr>
                    <tr>
                        <th>Breaking News</th>
                        <td>{{ $postById->breaking_news }}</td>
                    </tr>
                    <tr>
                        <th>Category Name</th>
                        <td>{{ $postById->category_name }}</td>
                    </tr>
                    <tr>
                        <th>Tag Name</th>
                        <td>{{ $postById->tag_name }}</td>
                    </tr>
                    <tr>
                        <th>Post Short Description</th>
                        <td>{{ $postById->short_description }}</td>
                    </tr>
                    <tr>
                        <th>Post Long Description</th>
                        <td>{{ $postById->long_description }}</td>
                    </tr>
                    <tr>
                        <th>Post Image</th>
                        <td><img src="{{ asset($postById->post_image) }}" alt=""></td>
                    </tr>
                    <tr>
                        <th>Publication Status</th>
                        <td>{{ $postById->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection