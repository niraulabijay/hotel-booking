@extends('admin.layout.master')
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
                <div class="card" style="margin-bottom: 20px">
                    <div class="card-header" style="background-color: #5e91bb">

                        <div style="font-weight: bold">Add Site Main Settings</div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{  route('postSimple') }}" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="form-group">
                                <label for="vat">VAT</label><span style="color: red;">*</span>
                                <input type="number" class="form-control" id="vat" name="vat" >
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="service_charge">Service Charge</label><span style="color: red;">*</span>
                                <input type="number" class="form-control" id="service_charge" name="service_charge">
                            </fieldset>
                            <fieldset class="form-group">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="main-img-preview">
                                            <img class="thumbnail img-preview"
                                                 title="Uploaded Photo will be displayed Here">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <div class="fileUpload btn btn-danger fake-shadow">
                                                        <span><i class="glyphicon glyphicon-upload"></i> Upload Photo</span>
                                                        <input id="logo-id" name="logo" type="file"
                                                               class="attachment_upload">
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="help-block">* Upload Logo *</p>

                                        </div>
                                    </div>
                                </div>

                            </fieldset>

                            <fieldset>
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
    <script>
        $(document).ready(function () {
            var brand = document.getElementById('logo-id');
            brand.className = 'attachment_upload';
            brand.onchange = function () {
                document.getElementById('fakeUploadLogo').value = this.value.substring(12);
            };

            // Source: http://stackoverflow.com/a/4459419/6396981
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.img-preview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#logo-id").change(function () {
                readURL(this);
            });
        });


    </script>

@endsection