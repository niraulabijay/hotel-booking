@extends('admin.layout.master')
@section('header')
@endsection
@section('content')

    <div class="col-md-10 offset-1">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if(session('success'))
                            <span class="success alert-success">{{ session('success') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="card" style="">
                            <div class="card-header" style="background-color: #5e91bb">
                                <div style="font-weight: bold">All Rooms</div>
                                <a href="{{  route('add_room') }}" class="btn btn-secondary float-right"
                                   style="margin-top: -26px">Add +</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-bordered">
                                    <tr>

                                        <th>ID</th>
                                        <th>Room Number</th>
                                        <th>Status</th>
                                        <th>Room Type</th>
                                        <th>Floor</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($rooms as $room)
                                        {{--                                        @dd($room->roomtype)--}}
                                        <tr>
                                            <td>{{ $room->id }}</td>
                                            <td>{{  $room->number }}</td>
                                            <td>@if($room->status == 0)
                                                    Inactive
                                                @else
                                                    Active
                                                @endif
                                            </td>
                                            <td>{{  $room->roomtype->name }}</td>
                                            {{--                                            @dd($room->floor)--}}
                                            <td>{{  $room->floor->name }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#confirm{{$room->id}}"
                                                        style="display: inline-block">
                                                    @if($room->status == 0)
                                                        Make Active
                                                    @else
                                                        Make Inactive
                                                    @endif
                                                </button>
                                                <div class="modal fade" id="confirm{{$room->id}}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Confirm</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @if($room->status == 0)
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
                                                                <a href="{{route('confirm_room',$room->id)}}"
                                                                   class="btn btn-primary">Confirm</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#edit{{$room->id}}" style="display: inline-block">
                                                    Edit
                                                </button>
                                                <div class="modal fade" id="edit{{$room->id}}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" style="padding-left: 40px"
                                                         role="document">
                                                        <form action="{{ route('edit_room',$room->id) }}" method="post">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                        Room</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @csrf
                                                                    <fieldset class="form-group">
                                                                        <label for="room_type">Room Type</label>
                                                                        <select class="form-control select2" name="room_type" id="room_type" style="width: 100%;">
                                                                            @foreach($roomtypes as $roomtype)
                                                                                <option value="{{  $roomtype->id }}" @if($room->room_type == $roomtype->id) selected @endif>{{  $roomtype->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </fieldset>
                                                                    <fieldset class="form-group">
                                                                        <label for="floor_number">Floor Number</label>
                                                                        <select class="form-control select2" name="floor_number" id="floor_number" style="width: 100%;">
                                                                            @foreach($floors as $floor)
                                                                                <option value="{{  $floor->id }}" @if($room->floor_number == $floor->id) selected @endif>{{  $floor->number }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </fieldset>
                                                                    <fieldset class="form-group">
                                                                        <label for="number">Add Number</label><span style="color: red;">*</span>
                                                                        <input type="number" class="form-control" id="number" name="number" value="{{ $room->number }}" required>
                                                                    </fieldset>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-secondary"
                                                                            data-dismiss="modal">
                                                                        Cancel
                                                                    </button>
                                                                    <button type="submit"
                                                                       class="btn btn-primary">Confirm</button>
                                                                </div>
                                                            </div>
                                                        </form>
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

            </div>
        </section>
    </div>

@endsection
@section('script')
@endsection