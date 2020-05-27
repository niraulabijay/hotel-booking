@extends('admin.layout.master')
@section('content')




    <div class="col-md-10 offset-md-1">
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

                        <div class="card">
                            <div class="card-header" style="background-color: #5e91bb">
                                <div style="font-weight: bold">All Paid Services</div>
                                <a href="{{  route('add_paid_service') }}" class="btn btn-secondary float-right" style="margin-top: -26px">Add +</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-bordered">
                                    <tr>

                                        <th>S.No</th>
                                        <th>Service</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{  $service->id }}</td>
                                            <td>{{  $service->name }}</td>
                                            <td>@if($service->status == 0)
                                                    Inactive
                                                @else
                                                    Active
                                                @endif
                                            </td>
                                            <td>{{  $service->price }}</td>
                                            <td><img src="{{  asset($service->image) }}" style="height: 100px; width: auto"></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#confirm{{$service->id}}" style="display: inline-block">
                                                    @if($service->status == 0)
                                                        Make Active
                                                    @else
                                                        Make Inactive
                                                    @endif
                                                </button>
                                                <div class="modal fade" id="confirm{{$service->id}}" tabindex="-1"
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
                                                                @if($service->status == 0)
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
                                                                <a href="{{route('confirm_paid_service',$service->id)}}"
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

            </div>
        </section>
    </div>
    @endsection