@extends('admin.layout.master')

@section('styles')

    {{--page specific styles--}}

@endsection

@section('headers')

    {{--Header--}}
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">System Users Management</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/users/system">System Users</a></li>
            {{--<li class="breadcrumb-item"><a href="/admin/countries/add">Add</a></li>--}}
        </ol>
    </div>

@endsection

@section('content')

    {{--main content--}}
    <div class="card">
        <div class="car-header">
            <span style="font-size: 30px;">ALL ADMINS</span>
            <span class="offset-8">
                <a class="btn btn-sm btn-primary" href="{{ route('add_system_user') }}">Create New User</a>
            </span>
            <hr>
        </div>
        
        <div class="card-body user_permissions">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="permissions_table">
                    <thead>
                    <tr class="table-primary">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Permissions</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $admin)
                        <tr>
                            <td>{{ $admin->first_name }} {{ $admin->last_name }}</td>
                            <td>{{ $admin->email }}</td>
                            {{--<td>--}}
                                {{--<ul>--}}
                                {{--@foreach($admin->permissions as $permission)--}}
                                    {{--<li>{{ $admin->permissions }}</li>--}}
                                {{--@endforeach--}}
                                {{--</ul>--}}
                            {{--</td>--}}
                            <td>
                                <ul>
                                @foreach($admin->permissions as $key => $permission)
                                    <li>{{ $key }}</li>
                                @endforeach
                                </ul>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('edit_system_user',$admin->id) }}">Edit</a>

                                <button class="btn btn-danger" data-toggle="modal"
                                        data-target="#delete_user{{ $admin->id }}">
                                    Delete
                                </button>

                                <div class="modal fade" id="delete_user{{ $admin->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete USER !!</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Are you sure want to delete this User?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ route('delete_system_user',$admin->id) }}" class="btn btn-danger delete_user">
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
    </div>

@endsection


@section('scripts')

    {{--page specific scripts--}}
    <script src="{{ asset('admin_lte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin_lte/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#permissions_table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true
            });
        });
    </script>

@endsection