@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Category</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="well" style="">
                <h1 class="text-center"> {{Session::get('message')}}</h1>

                <form action="{{ url('/new-category') }}" method="POST" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="categoryName" class="col-sm-3 control-label">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="category_name" class="form-control" id="categoryName"
                                   placeholder="Category Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categoryDescription" class="col-sm-3 control-label">Category Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="category_description" rows="10" style="resize: none"
                                      id="categoryDescription"></textarea>
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
                            <button type="submit" name="btn" class="btn btn-success btn-block">Save Category Info
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection