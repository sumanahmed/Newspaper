@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View Comment</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered" width="80%">
                <tr>
                    <th>id</th>
                    <td>{{ $commentById->id }}</td>
                </tr>
                <tr>
                    <th>Comment</th>
                    <td>{{ $commentById->message }}</td>
                </tr>
                <tr>
                    <th>Approval Status</th>
                    <td>{{ $commentById->approval_status == 1 ? 'Approved' : 'Unapproved' }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection