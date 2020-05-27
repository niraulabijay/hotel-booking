@extends('admin.layout.master')
@section('header')
    <link rel="stylesheet" href="{{  asset('admin_lte/plugins/select2/select2.min.css')}}">
@endsection
@section('content')
    <div class="col-md-10 offset-md-1">
        <section class="content" style="padding: 10px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if(session('success'))
                            <span class="success alert-success">{{ session('success') }}</span>
                        @endif
                    </div>
                </div>
                <fieldset class="card" style="margin-bottom: 20px">
                    <div class="card-header" style="background-color: #5e91bb">

                        <div style="font-weight: bold">Edit Room Type - {{ $roomtype->name }}</div>
                    </div>
                    <fieldset class="card-body">
                        <form method="post" id="edit_form" action="{{  route('post_room_type_edit',$roomtype->id) }}" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="form-group">
                                <label for="first_name">Room Type</label><span style="color: red;">*</span>
                                <input type="text" class="form-control" id="first_name" name="name" value="{{ $roomtype->name }}" required>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="short-code">Short Code</label><span style="color: red;">*</span>
                                <input type="text" class="form-control" id="short-code" name="short_code" value="{{ $roomtype->short_code }}" required>
                            </fieldset>
                            {{--<fieldset class="form-group">--}}
                            {{--<label for="image_thumbnail">Add Thumbnail Image</label><span--}}
                            {{--style="color: red;">*</span>--}}
                            {{--<input type="file" class="form-control" id="image_thumbnail" name="image_thumbnail"--}}
                            {{--required>--}}
                            {{--</fieldset>--}}
                            <fieldset class="form-group">
                                <label for="prof_pic"><span
                                            style="color: red;">*</span>Add Thumbnail Image</label>
                                <input type='file' class="btn btn-secondary" name="image_thumbnail" id="imgInp">
                                <div class="style-photo"
                                     style="display: block; padding-top: 10px; padding-left: 30px; width: 440px; height: 240px;">
                                    <img id="blah" src="{{ asset($roomtype->image_thumbnail) }}" alt="your image"
                                         style="width: auto; height: 240px; overflow:hidden; border-radius: 6%;"/>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="editor">Room Type Description</label><span style="color: red;">*</span>
                                <textarea name="description" class="form-control" id="editor">
                                    {!! $roomtype->description !!}
                                </textarea>
                            </fieldset>
                            <div class="row">
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="base_occupancy">Base Occupancy</label>
                                        <input type="number" class="form-control" id="base_occupancy"
                                               name="base_occupancy" value="{{ $roomtype->base_occupancy }}" min="0">
                                    </fieldset>
                                </div>
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="higher_occupancy">Higher Occupancy</label>
                                        <input type="number" class="form-control" id="higher_occupancy"
                                               name="higher_occupancy"
                                               min="0"
                                               value="{{ $roomtype->higher_occupancy }}">
                                    </fieldset>
                                </div>
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="child_occupancy">Child Occupancy</label>
                                        <input type="number" class="form-control" id="child_occupancy"
                                               name="child_occupancy" min="0"
                                               value="{{ $roomtype->child_occupancy }}">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="base_price">Base Price</label>
                                        <input type="number" class="form-control" id="base_price" name="base_price"
                                               min="0"
                                               value="{{ $roomtype->base_price }}">
                                    </fieldset>
                                </div>
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="extra_person_price">Extra Person price</label>
                                        <input type="number" class="form-control" id="extra_person_price"
                                               name="extra_person_price"
                                               min="0"
                                               value="{{ $roomtype->extra_person_price }}">
                                    </fieldset>
                                </div>
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="extra_bed_price">Extra Bed price</label>
                                        <input type="number" class="form-control" id="extra_bed_price"
                                               name="extra_bed_price"
                                               min="0"
                                               value="{{ $roomtype->extra_bed_price }}">
                                    </fieldset>
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <label for="amenity">Amenities</label>
                                <select name="amenities[]" class="form-control select2" multiple="multiple" id="amenity"
                                        style="width: 100%;">
                                    @foreach($amenities as $amenity)
                                        <option value="{{  $amenity->id }}"
                                            @foreach($roomtype->amenities as $sel_amm)
                                                    @if($sel_amm->id == $amenity->id) selected @endif
                                                @endforeach
                                        >{{  $amenity->name }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </form>

                            <fieldset class="form-group">
                                <label for="multiple"> Enter other related images </label>
                                <div class="jumbotron jumbotron-image">
                                    <div class="container-fluid image-container">
                                        <form action="{{ route('edit_upload_roomtype',$roomtype->id) }}" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="form-group">
                                                <input type="file" name="upload" id="file" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="roomtype_id" value="{{ $roomtype->id }}">
                                                <button id="upload_submit" class="btn btn-success form-control upload_submit">Upload
                                                </button>
                                            </div>
                                        </form>
                                        <div class="row">
                                            @foreach($roomtype->images as $image)
                                                <div class="col-md-6">
                                                    <div class="card" style="width: auto; height: 250px">
                                                        <img class="upload img-responsive" src="{{ asset($image->image) }}" alt="image" style="width: auto; height: 200px; overflow: hidden">
                                                        <hr>
                                                        <div class="box-button" style="padding: 0px 20px 10px 20px">
                                                            <button class="remove_image btn btn-danger" id="{{ $image->id }}">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <button onclick="document.getElementById('edit_form').submit();" class="btn btn-info pull-right">Submit</button>
                            </fieldset>
                    </fieldset>
                </fieldset>
            </div>
    </section>
    </div>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script src="{{ asset('admin/js/form_script.js') }}"></script>

    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                    $('.style-photo').show();
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    </script>

    <script src="{{  asset('admin_lte/plugins/select2/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        });
    </script>

    <script src="http://malsup.github.com/jquery.form.js"></script>

    <script>
        $("body").on("click", ".upload_submit", function (event) {
            // event.preventDefault();
            $(this).parents("form").ajaxForm(options);
        });
        var options = {
            complete: function (response) {
                if ($.isEmptyObject(response.responseJSON.error)) {
                    // alert('Image upload successful');
                    $(".image-container").load(" .image-container");
                } else {
                    alert('Error in uploading');
                }
            }
        };
    </script>

    <script>
        $("body").on("click", ".remove_image", function (e) {
            e.preventDefault();
            let id = $(this).attr("id");
            console.log("image_id : " + id);
            $.ajax(
                {
                    url: '/room-type-edit/delete-image/'+ id,
                    type: 'GET',
                    dataType: "JSON",
                    success: function (response) {
                        // alert("Image Deleted");
                        $(".image-container").load(" .image-container");
                        // $(".message").text(response.success);
                        // $(".message").show();
                    },
                    error: function () {
                        alert("It failed");
                    }
                });

        });
    </script>




@endsection