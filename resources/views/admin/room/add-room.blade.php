@extends('admin.layout.master')
@section('header')
    @endsection
@section('content')
    <div class="col-md-8 offset-md-2">
        <section class="content" style="padding: 10px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if(session('success'))
                            <span class="success alert-success">{{ session('success') }}</span>
                        @endif
                    </div>
                </div>
                <div class="card" style="margin-bottom: 20px">
                    <div class="card-header" style="background-color: #5e91bb">

                        <div style="font-weight: bold">Add Amenities</div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{  route('post_room') }}" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="form-group">
                                <label for="room_type">Room Type</label>
                                <select class="form-control select2" name="room_type" id="room_type" style="width: 100%;">
                                    @foreach($roomtypes as $roomtype)
                                    <option value="{{  $roomtype->id }}">{{  $roomtype->name }}</option>
                                        @endforeach
                                </select>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="floor_number">Floor Number</label>
                                <select class="form-control select2" name="floor_number" id="floor_number" style="width: 100%;">
                                    @foreach($floors as $floor)
                                    <option value="{{  $floor->id }}">{{  $floor->number }}</option>
                                        @endforeach
                                </select>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="number">Add Number</label><span style="color: red;">*</span>
                                <input type="number" class="form-control" id="number" name="number" required>
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

    @endsection
@section('script')
    <script src="{{  asset('admin_lte/plugins/select2/select2.full.min.js') }}"></script>
@endsection