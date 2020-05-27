@extends('admin.layout.master')
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

                        <div style="font-weight: bold">Add Paid Service</div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{  route('post_paid_service') }}" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="form-group">
                                <label for="first_name">Service Name</label><span style="color: red;">*</span>
                                <input type="text" class="form-control" id="first_name" name="name" required>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="image_thumbnail">Add Thumbnail Image</label><span style="color: red;">*</span>
                                <input type="file" class="form-control" id="image_thumbnail" name="image_thumbnail" required>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="price">Add Price</label><span style="color: red;">*</span>
                                <input type="text" class="form-control" id="price" name="price" required>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="description">Service Description</label><span style="color: red;">*</span>
                                <textarea name="description" class="form-control" id="editor">
                                </textarea>
                            </fieldset>
                            <fieldset class="form-group">
                               <label for="multiple"> Enter other related images </label></h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-images" style="width: 100%" >
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

@endsection