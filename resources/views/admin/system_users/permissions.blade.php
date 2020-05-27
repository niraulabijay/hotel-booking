@extends('admin.layout.master')

@section('styles')

    {{--page specific styles--}}

@endsection

@section('headers')

    {{--Header--}}
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Manage Permissions</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/users/permissions">Permissions</a></li>
        </ol>
    </div>
    <div class="col-sm-6">
        <button class="btn btn-sm btn-primary" data-toggle="modal"
                data-target="#add_permission">ADD
        </button>

        <div class="modal fade" id="add_permission" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form role="form" method="post" action="{{ route('post_add_permission') }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete permission !!</h5>
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="cname">Title</label>
                                <input type="text" class="form-control" name="title" id="cname"
                                       placeholder="Enter Permission Title" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content')

    {{--main content--}}
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered" id="permissions_table">
                <thead>
                <tr class="table-primary">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->title }}</td>
                        <td>{{ $permission->created_at->toDateString() }}</td>
                        <td>
                            <button class="btn btn-sm-group btn-primary" data-toggle="modal"
                                    data-target="#edit_permission{{ $permission->id }}">Edit
                            </button>

                            <div class="modal fade" id="edit_permission{{ $permission->id }}" tabindex="-1"
                                 role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('post_edit_permission',$permission->id) }}"
                                              method="post">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit
                                                    Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="cname">Category Title</label>
                                                        <input type="text" class="form-control" name="title"
                                                               id="cname" placeholder="Enter Permission Title"
                                                               value="{{ $permission->title }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">
                                                    Save Changes
                                                </button>
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-sm-group btn-danger" data-toggle="modal"
                                    data-target="#delete_permission{{ $permission->id }}">Delete
                            </button>

                            <div class="modal fade" id="delete_permission{{ $permission->id }}" tabindex="-1"
                                 role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Delete permission !!</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h6>Are you sure want to delete this Permission?</h6>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ route('delete_permission',$permission->id) }}"
                                               class="btn btn-success">
                                                Yes
                                            </a>
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection


@section('scripts')

    {{--page specific scripts--}}

@endsection