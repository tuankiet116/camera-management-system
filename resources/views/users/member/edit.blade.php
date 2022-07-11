@extends('users.home')
@section('content')
<div class="content-wrapper p-5">
    <div class="alert alert-warning alert-dismissible fade show alert-image" role="alert">
        <strong>Image File Important!</strong> You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Notice:</strong>
        <p>If you want to update images of this member. Please delete this user and create new one.</p>
    </div>
    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ Session::get('success') }}
        <br>
    </div>
    @endif
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
        <strong>Error!</strong> {{ $error }}
        <br>
        @endforeach
    </div>
    @endif
    <form method="post" action="{{ route('member.update', ['id' => $member->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">{{ __('user.member.add_member.label_name') }} <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') ?? $member->name }}">
        </div>

        <div class="form-group">
            <label>Images Detected <span class="text-danger">*</span></label>
            <div class="row">
                @foreach ($member->getImages as $image)
                <div class="col-sm-4 imgUp text-center">
                    <div style="background: url({{ route('member.image', ['memberId' => $member->id, 'fileName' => $image->image_src]) }}) no-repeat center;
                                background-size: contain;"
                        class="imagePreview">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="form-group text-center">
            <button class="btn btn-success">Update Member</button>
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
        background-color: #fff;
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
@endsection