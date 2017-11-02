@extends('admin.master')
@section('content')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View Category</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered ">
                <tr>
                    <th>id</th>
                    <td>{{$categoryById->id}}</td>
                </tr>
                <tr>
                    <th>Category Name</th>
                    <td>{{$categoryById->category_name}}</td>
                </tr>
                <tr>
                    <th>Category Description</th>
                    <td>{{$categoryById->category_description}}</td>
                </tr>
                <tr>
                    <th>id</th>
                    <td>{{$categoryById->publication_status==1?'Published':'Unpublished'}}</td>
                </tr>

            </table>
        </div>
    </div>
@endsection