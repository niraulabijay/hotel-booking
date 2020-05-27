@extends('admin.layout.master')
@section('content')
    <div class="col-md-12 offset-md-1">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div>
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
                                <div style="font-weight: bold">All Activities</div>
                                {{--<a href="{{  route('add_activity') }}" class="btn btn-secondary float-right"--}}
                                {{--style="margin-top: -26px">Add +</a>--}}

                                <button type="button" class="btn btn-secondary float-right" data-toggle="modal"
                                        data-target="#add_activity"
                                        style="margin-top: -26px; display: inline-block">
                                    Add+
                                </button>
                                <div class="modal fade" id="add_activity" tabindex="-1"
                                     role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <form method="post" action="{{  route('post_activity') }}"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        Add Activity</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <fieldset class="form-group">
                                                            <label for="first_name">Activity Name</label>
                                                            <input type="text" class="form-control" id="title"
                                                                   name="title" required>
                                                        </fieldset>
                                                        <fieldset class="form-group">
                                                            <label for="first_name">Price per person</label>
                                                            <input type="number" class="form-control" id="price"
                                                                   name="price" required>
                                                        </fieldset>
                                                        <fieldset class="form-group">
                                                            <label for="first_name">Add Image</label>
                                                            <input type="file" class="form-control" id="image"
                                                                   name="image" required>
                                                        </fieldset>
                                                        <fieldset class="form-group">
                                                            <label for="first_name">Description</label><br>
                                                            <textarea name="description" class="form-control"
                                                                      id="description"></textarea>
                                                        </fieldset>
                                                        <fieldset class="form-group">
                                                            <label for="first_name">Duration</label>
                                                            <input type="number" class="form-control" id="duration"
                                                                   name="duration" required>
                                                        </fieldset>
                                                        <fieldset class="form-group">
                                                            <label for="first_name">Duration
                                                                Unit</label><br>
                                                            <select name="duration_unit" value="{{$activities}}">
                                                                <option value="hour">Hour(s)</option>
                                                                <option value="minute">Minute(s)
                                                                </option>
                                                                <option value="day">Days(s)</option>
                                                                <option value="week">Week(s)</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <fieldset class="form-group">
                                                        <button type="submit"
                                                                class="btn btn-info pull-right btn-primary">Submit
                                                        </button>
                                                    </fieldset>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-bordered">
                                    <tr>

                                        <th>S.No</th>
                                        <th>Activity</th>
                                        <th>Price</th>
                                        <th>Duration</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($activities as $activity)
                                        <tr>
                                            <td>{{  $activity->id }}</td>
                                            <td>{{  $activity->title }}</td>
                                            <td>{{  $activity->price }}</td>
                                            <td>{{  $activity->duration }} {{$activity->duration_unit}}s</td>
                                            <td>@if($activity->status == 0)
                                                    Inactive
                                                @else
                                                    Active
                                                @endif
                                            </td>
                                            <td><img src="{{  asset($activity->image) }}"
                                                     style="height: 100px; width: 150px;"></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#confirm{{$activity->id}}"
                                                        style="display: inline-block">
                                                    @if($activity->status == 0)
                                                        Make Active
                                                    @else
                                                        Make Inactive
                                                    @endif
                                                </button>
                                                <div class="modal fade" id="confirm{{$activity->id}}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Change Status?</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @if($activity->status == 0)
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
                                                                <a href="{{route('confirm_activity',$activity->id)}}"
                                                                   class="btn btn-primary">Confirm</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#edit{{$activity->id}}"
                                                        style="display: inline-block">
                                                    Edit
                                                </button>
                                              <div class="modal fade" id="edit{{$activity->id}}" tabindex="-1"
                                                   role="dialog"
                                                   aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                      <div class="modal-dialog modal-lg" role="document">
                                                          <div class="modal-content">
                                                              <form method="post"
                                                                    action="{{  route('edit_activity',$activity->id) }}"
                                                                    enctype="multipart/form-data">
                                                                  @csrf

                                                                  <div class="modal-header">
                                                                      <h5 class="modal-title" id="exampleModalLabel">
                                                                          Edit Activity</h5>
                                                                      <button type="button" class="close"
                                                                              data-dismiss="modal"
                                                                              aria-label="Close">
                                                                          <span aria-hidden="true">&times;</span>
                                                                      </button>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                      <div class="card-body">
                                                                          <fieldset class="form-group">
                                                                              <label for="first_name">Activity
                                                                                  Name</label>
                                                                              <input type="text" class="form-control"
                                                                                     id="title" name="title"
                                                                                     value="{{$activity->title}}"
                                                                                     required>
                                                                          </fieldset>
                                                                          <fieldset class="form-group">
                                                                              <label for="first_name">Price per
                                                                                  person</label>
                                                                              <input type="number" class="form-control"
                                                                                     id="price" name="price"
                                                                                     value="{{$activity->price}}"
                                                                                     required>
                                                                          </fieldset>
                                                                          <fieldset class="form-group">
                                                                              <label for="first_name">Add Image</label>
                                                                              <input type="file" class="form-control"
                                                                                     id="image" name="image">
                                                                          </fieldset>
                                                                          <fieldset class="form-group">
                                                                              <label for="first_name">Description</label><br>
                                                                              <textarea name="description"
                                                                                        class="form-control"
                                                                                        id="description">{{$activity->description}}</textarea>
                                                                          </fieldset>
                                                                          <fieldset class="form-group">
                                                                              <label for="first_name">Duration</label>
                                                                              <input type="number" class="form-control"
                                                                                     id="duration" name="duration"
                                                                                     value="{{$activity->duration}}"
                                                                                     required>
                                                                          </fieldset>
                                                                          <br>
                                                                          <fieldset class="form-group">
                                                                              <label for="first_name">Duration
                                                                                  Unit</label><br>
                                                                              <select name="duration_unit" id="">
                                                                                  <option value="hour"
                                                                                          @if($activity->duration_unit=="hour")selected @endif>
                                                                                      Hour(s)
                                                                                  </option>
                                                                                  <option value="minute"
                                                                                          @if($activity->duration_unit=="minute")selected @endif>
                                                                                      Minute(s)
                                                                                  </option>
                                                                                  <option value="day"
                                                                                          @if($activity->duration_unit=="day")selected @endif>
                                                                                      Days(s)
                                                                                  </option>
                                                                                  <option value="week"
                                                                                          @if($activity->duration_unit=="week")selected @endif>
                                                                                      Week(s)
                                                                                  </option>
                                                                              </select>
                                                                          </fieldset>
                                                                      </div>

                                                                  </div>
                                                                  <div class="modal-footer">
                                                                      <fieldset class="form-group">
                                                                          <button type="submit"
                                                                                  class="btn btn-info pull-right btn-primary">
                                                                              Submit
                                                                          </button>
                                                                      </fieldset>
                                                                  </div>
                                                              </form>
                                                          </div>
                                                      </div>
                                                  </div>

                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#delete{{$activity->id}}"
                                                        style="display: inline-block">
                                                    Delete
                                                </button>
                                                <div class="modal fade" id="delete{{$activity->id}}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Delete Activity?</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this activity?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">
                                                                    Cancel
                                                                </button>
                                                                <a href="{{route('delete_activity',$activity->id)}}"
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
                </div>
            </div>
        </section>
    </div>
@endsection
