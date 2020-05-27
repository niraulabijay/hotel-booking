@extends('admin.layout.master')

@section('styles')

    {{--page specific styles--}}


@endsection

@section('headers')

    {{--Header--}}
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Our Users</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/users/view">Users</a></li>
        </ol>
    </div>
    @if(session('success'))
        <span class="alert alert-success">{{ session('success') }}</span>
    @endif

@endsection

@section('content')

    {{--main content--}}
    {{--<div class="form-group pull-right">--}}
    {{--<input type="text" class="search form-control" placeholder="Search for?">--}}
    {{--</div>--}}
    {{--<span class="counter pull-right"></span>--}}
    {{--<div class="table-responsive">--}}
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-bordered" id="user_table">
                <thead>
                <tr class="table-primary">
                    <th>ID</th>
                    <th class="">Full Name</th>
                    <th class="">EMail</th>
                    <th class="">DOB</th>
                    {{--<th>Country</th>--}}
                    <th>Date Joined</th>
                    <th>Last Login</th>
                    <th>Role</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->dob }}</td>
                        {{--                <td>{{ $user->country }}</td>--}}
                        <td>{{ $user->created_at->toDateString() }}</td>
                        <td>{{ $user->last_login }}</td>
                        <td>
                            @foreach($user->roles as $role)
                                {{ $role->name }} .
                            @endforeach
                            <i class="fa fa-edit" style="font-size:24px" data-toggle="modal"
                               data-target="#role_modal{{ $user->id }}" title="Edit Role"></i>
                            <div class="modal fade" id="role_modal{{ $user->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('edit_role',$user->id) }}" method="post">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit
                                                    Role</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="role">Manage Role:</label>
                                                    <select name="roles" id="role" class="form-control">
                                                        @foreach($roles as $role)
                                                            @if($role->slug != 'developer')
                                                                <option value={{$role->id}}
                                                                @foreach($user->roles as $selected) @if($selected->id == $role->id) selected @endif @endforeach
                                                                >
                                                                    {{ $role->name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
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
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{--</div>--}}

@endsection


@section('script')

    {{--page specific scripts--}}

    <script src="{{ asset('admin_lte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin_lte/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#user_table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select-2').select2()
        });
    </script>


@endsection