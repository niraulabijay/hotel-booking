@extends('admin.layout.master')
@section('header')
    <link rel="stylesheet" href="{{  asset('admin_lte/plugins/select2/select2.min.css')}}">
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

                        <div style="font-weight: bold">Add Room Types</div>
                    </div>
                    <fieldset class="card-body">
                        <form method="post" action="{{  route('post_room_type') }}" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="form-group">
                                <label for="first_name">Room Type</label><span style="color: red;">*</span>
                                <input type="text" class="form-control" id="first_name" name="name" required>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="short-code">Short Code</label><span style="color: red;">*</span>
                                <input type="text" class="form-control" id="short-code" name="short_code" required>
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
                                <div class="style-photo" style="display: none; padding-top: 10px; padding-left: 30px; width: 440px; height: 240px;">
                                    <img id="blah" src="#" alt="your image" style="width: auto; height: 240px; overflow:hidden; border-radius: 6%;"/>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="description">Room Type Description</label><span style="color: red;">*</span>
                                <textarea name="description" class="form-control" id="editor">
                                </textarea>
                            </fieldset>
                            <div class="row">
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="base_occupancy">Base Occupancy</label>
                                        <input type="number" class="form-control" id="base_occupancy" name="base_occupancy" min="0" >
                                    </fieldset>
                                </div>
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="higher_occupancy">Higher Occupancy</label>
                                        <input type="number" class="form-control" id="higher_occupancy" name="higher_occupancy"
                                               min="0" >
                                    </fieldset>
                                </div>
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="child_occupancy">Child Occupancy</label>
                                        <input type="number" class="form-control" id="child_occupancy" name="child_occupancy" min="0" >
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="base_price">Base Price</label>
                                    <input type="number" class="form-control" id="base_price" name="base_price" min="0" >
                                    </fieldset>
                                </div>
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="extra_person_price">Extra Person price</label>
                                        <input type="number" class="form-control" id="extra_person_price" name="extra_person_price"
                                              min="0" >
                                    </fieldset>
                                </div>
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="extra_bed_price">Extra Bed price</label>
                                        <input type="number" class="form-control" id="extra_bed_price" name="extra_bed_price"
                                               min="0" >
                                    </fieldset>
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <label for="amenity">Amenities</label>
                                <select name="amenities[]" class="form-control select2" multiple="multiple" id="amenity" style="width: 100%;">
                                    @foreach($amenities as $amenity)
                                    <option value="{{  $amenity->id }}">{{  $amenity->name }}</option>
                                        @endforeach
                                </select>
                            </fieldset>

                            <fieldset class="form-group">
                                <label for="multiple"> Enter other related images </label></h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-images" style="width: 100%">
                                            <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Image</th>
                                                {{--                                                <th>Main</th>--}}
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                {{--                                                <th></th>--}}
                                                <th>
                                                    <button class="btn btn-primary btn-sm btn-add-images">
                                                        Add New
                                                    </button>
                                                </th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
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

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                    $('.style-photo').show();
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
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


@endsection