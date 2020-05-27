@extends('admin.layout.master')
@section('headers')
    @endsection
@section('content')
    <div class="col-md-8 offset-md-2">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if(session('success'))
                            <span class="success alert-success">{{ session('success') }}</span>
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" style="background-color: #5e91bb">

                        <div style="font-weight: bold">Add Floors</div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{  route('post_floor') }}" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="form-group">
                                <label for="first_name">Floor Name</label>
                                <input type="text" class="form-control" id="first_name" name="name" required>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="floor_number">Floor Number</label>
                                <input type="text" class="form-control" id="floor_number" name="number" required>
                            </fieldset>
                            <fieldset class="form-group">
                                <button type="submit" class="btn btn-info pull-right">Submit</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header" style="background-color: #5e91bb">
                    <div style="font-weight: bold">All Floors</div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <tr>

                            <th>S.No</th>
                            <th>Floor</th>
                            <th>Status</th>
                            <th>Number</th>
                            <th>Action</th>
                        </tr>
                        @foreach($floors as $floor)
                            <tr>
                                <td>{{  $floor->id }}</td>
                                <td>{{  $floor->name }}</td>
                                <td>@if($floor->status == 0)
                                        Inactive
                                    @else
                                        Active
                                    @endif
                                </td>
                                <td>{{  $floor->number }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#confirm{{$floor->id}}" style="display: inline-block">
                                        @if($floor->status == 0)
                                            Make Active
                                        @else
                                            Make Inactive
                                        @endif
                                    </button>
                                    <div class="modal fade" id="confirm{{$floor->id}}" tabindex="-1"
                                         role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if($floor->status == 0)
                                                        Do you want to make it Active ?
                                                    @else
                                                        Do you want to make it Inactive ?
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                    <a href="{{route('confirm_floor',$floor->id)}}"
                                                       class="btn btn-primary">Confirm</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
@section('script')
    @endsection