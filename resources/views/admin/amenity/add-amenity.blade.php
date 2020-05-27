@extends('admin.layout.master')
@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <section class="content">
                <div class="container-fluid">
                    <div>
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                    </div>
                    <div class="card">
                        <div class="card-header" style="background-color: #5e91bb">
                            <div style="font-weight: bold">All Amenities</div>
                            <button type="button" class="btn btn-secondary float-right" data-toggle="modal"
                                    data-target="#add_amenity"
                                    style="margin-top: -26px; display: inline-block">
                                Add+
                            </button>
                            <div class="modal fade" id="add_amenity" tabindex="-1"
                                 role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="{{  route('post_amenity') }}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Add Amenity</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <fieldset class="form-group">
                                                        <label for="first_name">Amenity Name</label>
                                                        <input type="text" class="form-control" id="first_name"
                                                               name="name" required>
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <label for="first_name">Add Image</label>
                                                        <input type="file" class="form-control" id="image" name="image"
                                                               required>
                                                    </fieldset>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <fieldset class="form-group">
                                                    <button type="submit" class="btn btn-info btn-primary pull-right">Submit
                                                    </button>
                                                </fieldset>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-bordered">
                                <tr>

                                    <th>S.No</th>
                                    <th>Amenity</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($amenities as $amenity)
                                    <tr>
                                        <td>{{  $amenity->id }}</td>
                                        <td>{{  $amenity->name }}</td>
                                        <td>@if($amenity->status == 0)
                                                Inactive
                                            @else
                                                Active
                                            @endif
                                        </td>
                                        <td><img src="{{  asset($amenity->image) }}" style="width: 50px; height: 25px">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#confirm{{$amenity->id}}"
                                                    style="display: inline-block">
                                                @if($amenity->status == 0)
                                                    Make Active
                                                @else
                                                    Make Inactive
                                                @endif
                                            </button>
                                            <div class="modal fade" id="confirm{{$amenity->id}}" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Change
                                                                Status?</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if($amenity->status == 0)
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
                                                            <a href="{{route('confirm_amenity',$amenity->id)}}"
                                                               class="btn btn-primary">Confirm</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#edit{{$amenity->id}}"
                                                    style="display: inline-block">
                                                Edit
                                            </button>
                                            <div class="modal fade" id="edit{{$amenity->id}}" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <form method="post"
                                                              action="{{  route('edit_amenity',$amenity->id) }}"
                                                              enctype="multipart/form-data">
                                                            @csrf

                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Edit Amenity</h5>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card-body">
                                                                    <fieldset class="form-group">
                                                                        <label for="first_name">Amenity Name</label>
                                                                        <input type="text" class="form-control"
                                                                               id="first_name"
                                                                               value="{{$amenity->name}}" name="name"
                                                                               required>
                                                                    </fieldset>
                                                                    <fieldset class="form-group">
                                                                        <label for="first_name">Add Image</label>
                                                                        <input type="file" class="form-control"
                                                                               id="image" name="image"
                                                                        >
                                                                    </fieldset>

                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <fieldset class="form-group">
                                                                    <button type="submit"
                                                                            class="btn btn-primary btn-info pull-right">
                                                                        Submit
                                                                    </button>
                                                                </fieldset>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#delete{{$amenity->id}}"
                                                    style="display: inline-block">
                                                Delete
                                            </button>
                                            <div class="modal fade" id="delete{{$amenity->id}}" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Delete Amenity?</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this amenity?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">
                                                                Cancel
                                                            </button>
                                                            <a href="{{route('delete_amenity',$amenity->id)}}"
                                                               class="btn btn-primary btn-danger">Delete</a>
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
            </section>
        </div>
    </div>
@endsection
