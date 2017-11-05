@extends('admin.master')
@section('content')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Category</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="well" style="">
                <h1 class="text-center"> {{Session::get('message')}}</h1>
                <form name="editCategoryForm" action="{{ url('/update-category') }}" method="POST"
                      class="form-horizontal">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="categoryName" class="col-sm-3 control-label">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" value="{{$categoryById->category_name}}" name="category_name" class="form-control" id="categoryName" />
                            <input type="hidden" value="{{$categoryById->id}}" name="category_id" class="form-control" id="categoryName">
                            {{ $errors->has('category_name') ? $errors->first('category_name') : ' ' }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categoryDescription" class="col-sm-3 control-label">Category Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="category_description" rows="10" style="resize: none" id="categoryDescription">{{$categoryById->category_description}}</textarea>
                            {{ $errors->has('category_description') ? $errors->first('category_description') : ' ' }}
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
                            <button type="submit" name="btn" class="btn btn-success btn-block">Update Category Info
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.forms['editCategoryForm'].elements['publication_status'].value = '{{$categoryById->publication_status}}';
    </script>
@endsection