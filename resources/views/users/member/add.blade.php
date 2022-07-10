@extends('users.home')
@section('content')
<div class="content-wrapper p-5">
    <div class="alert alert-warning alert-dismissible fade show alert-image" role="alert">
        <strong>Image File Important!</strong> You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
        <strong>Error!</strong> {{ $error }}
        <br>
        @endforeach
    </div>
    @endif
    <form method="post" action="{{ route('member.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">{{ __('user.member.add_member.label_name') }} <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label>{{ __('user.member.add_member.label_image_front') }} <span class="text-danger">*</span></label>
            <div class="row">
                <div class="col-sm-4 imgUp text-center">
                    <div class="imagePreview"></div>
                    <label class="btn btn-primary">Upload
                        <input type="file" class="uploadFile img" name="image_front_1" value="Upload Photo"
                            style="width: 0px;height: 0px;overflow: hidden;">
                    </label>
                </div>
                <div class="col-sm-4 imgUp text-center">
                    <div class="imagePreview"></div>
                    <label class="btn btn-primary">Upload
                        <input type="file" class="uploadFile img" name="image_front_2" value="Upload Photo"
                            style="width: 0px;height: 0px;overflow: hidden;">
                    </label>
                </div>
                <div class="col-sm-4 imgUp text-center">
                    <div class="imagePreview"></div>
                    <label class="btn btn-primary">Upload
                        <input type="file" class="uploadFile img" name="image_front_3" value="Upload Photo"
                            style="width: 0px;height: 0px;overflow: hidden;">
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>{{ __('user.member.add_member.label_image_left') }} <span class="text-danger">*</span></label>
            <div class="row">
                <div class="col-sm-4 imgUp text-center">
                    <div class="imagePreview"></div>
                    <label class="btn btn-primary">Upload
                        <input type="file" class="uploadFile img" name="image_left_1" value="Upload Photo"
                            style="width: 0px;height: 0px;overflow: hidden;">
                    </label>
                </div>
                <div class="col-sm-4 imgUp text-center">
                    <div class="imagePreview"></div>
                    <label class="btn btn-primary">Upload
                        <input type="file" class="uploadFile img" name="image_left_2" value="Upload Photo"
                            style="width: 0px;height: 0px;overflow: hidden;">
                    </label>
                </div>
                <div class="col-sm-4 imgUp text-center">
                    <div class="imagePreview"></div>
                    <label class="btn btn-primary">Upload
                        <input type="file" class="uploadFile img" name="image_left_3" value="Upload Photo"
                            style="width: 0px;height: 0px;overflow: hidden;">
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>{{ __('user.member.add_member.label_image_right') }} <span class="text-danger">*</span></label>
            <div class="row">
                <div class="col-sm-4 imgUp text-center">
                    <div class="imagePreview"></div>
                    <label class="btn btn-primary">Upload
                        <input type="file" class="uploadFile img" name="image_right_1" value="Upload Photo"
                            style="width: 0px;height: 0px;overflow: hidden;">
                    </label>
                </div>
                <div class="col-sm-4 imgUp text-center">
                    <div class="imagePreview"></div>
                    <label class="btn btn-primary">Upload
                        <input type="file" class="uploadFile img" name="image_right_2" value="Upload Photo"
                            style="width: 0px;height: 0px;overflow: hidden;">
                    </label>
                </div>
                <div class="col-sm-4 imgUp text-center">
                    <div class="imagePreview"></div>
                    <label class="btn btn-primary">Upload
                        <input type="file" class="uploadFile img" name="image_right_3" value="Upload Photo"
                            style="width: 0px;height: 0px;overflow: hidden;">
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group text-center">
            <button class="btn btn-success">Create Member</button>
        </div>
    </form>
</div>
<style>
    body {
        background-color: #f5f5f5;
    }

    .imagePreview {
        width: 300px;
        height: 300px;
        background-position: center;
        background: url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
        background-color: #fff;
        background-size: contain;
        background-position: center; 
        background-repeat: no-repeat;
        display: inline-block;
        box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
        box-shadow: 0px 4px 6px 2px rgba(0, 0, 0, 0.2);
        margin-top: -5px;
        width: 300px;
        margin: auto;
    }

    .btn-success {
        box-shadow: 0px 4px 6px 2px rgba(0, 0, 0, 0.2);
        margin-top: -5px;
        margin: auto;
    }

    .imgUp {
        margin-bottom: 15px;
    }

    .alert-image {
        display: none;
    }
</style>

<script>
    $(function() {
    $(document).on("change",".uploadFile", function()
    {
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return;
 
        if (/^image/.test( files[0].type)){
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);
            reader.onloadend = function(){
                uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }
        else {
            $('.alert-image').css('display', 'block');
        }
    });
});
</script>
@endsection