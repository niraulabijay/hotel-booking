@extends('admin.layout.master')

@section('styles')

    {{--page specific styles--}}


@endsection

@section('headers')

    {{--Header--}}
    {{--<div class="col-sm-6">--}}
        {{--<h1 class="m-0 text-dark">Our Users</h1>--}}
    {{--</div>--}}
    {{--<div class="col-sm-6">--}}
        {{--<ol class="breadcrumb float-sm-right">--}}
            {{--<li class="breadcrumb-item"><a href="/admin">Home</a></li>--}}
            {{--<li class="breadcrumb-item"><a href="/admin/users/view">Users</a></li>--}}
        {{--</ol>--}}
    {{--</div>--}}

@endsection

@section('content')

    <h2>Unauthorized Access</h2>

@endsection


@section('script')

    {{--page specific scripts--}}

    {{--<script src="{{ asset('admin_lte/plugins/datatables/jquery.dataTables.js') }}"></script>--}}
    {{--<script src="{{ asset('admin_lte/plugins/datatables/dataTables.bootstrap4.js') }}"></script>--}}
    {{--<script>--}}
        {{--$(document).ready(function () {--}}
            {{--$('#user_table').DataTable({--}}
                {{--"paging": true,--}}
                {{--"lengthChange": true,--}}
                {{--"searching": true,--}}
                {{--"ordering": true,--}}
                {{--"info": true,--}}
                {{--"autoWidth": true--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>--}}
    {{--<script>--}}
        {{--$(function () {--}}
            {{--//Initialize Select2 Elements--}}
            {{--$('.select-2').select2()--}}
        {{--});--}}
    {{--</script>--}}


@endsection